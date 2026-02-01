## 2024-05-22 - CSRF via GET State Change
**Vulnerability:** Contact form submission was using GET request to `/contatos/create`, which persisted data to the database and sent emails.
**Learning:** The resource controller's `create` method was being used as a processing endpoint instead of just a display endpoint, bypassing CSRF protection (since GET requests are typically exempt) and violating HTTP semantics.
**Prevention:** Ensure state-changing actions always use POST/PUT/DELETE methods. Verify `Route::resource` methods are used for their intended purpose (create=show form, store=save data).

## 2024-05-23 - IDOR in Contact Form
**Vulnerability:** The `store` method in `ContatoController` was using `$request->id` (user input) to fetch the contact record for sending emails, instead of using the newly created contact instance. This allowed an attacker to send emails to arbitrary users by manipulating the `id` field.
**Learning:** Overwriting the variable holding the created model (`$contato`) with a lookup based on input (`findOrFail($request->id)`) introduced a critical logic flaw.
**Prevention:** Always use the object returned by `Model::create()` or `Model::save()` for subsequent operations. Avoid trusting ID inputs when the object was just created by the system.

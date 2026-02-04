## 2024-05-22 - CSRF via GET State Change
**Vulnerability:** Contact form submission was using GET request to `/contatos/create`, which persisted data to the database and sent emails.
**Learning:** The resource controller's `create` method was being used as a processing endpoint instead of just a display endpoint, bypassing CSRF protection (since GET requests are typically exempt) and violating HTTP semantics.
**Prevention:** Ensure state-changing actions always use POST/PUT/DELETE methods. Verify `Route::resource` methods are used for their intended purpose (create=show form, store=save data).

## 2024-05-22 - IDOR in Store Method
**Vulnerability:** The `store` method created a new contact but then re-fetched the contact using `Contato::findOrFail($request->id)`. This allowed an attacker to inject an arbitrary `id` in the request, causing the application to send sensitive emails to/about a different user (the victim) instead of the newly created contact.
**Learning:** Never trust user input (`$request->id`) to identify a resource that was just created. The `create()` method returns the model instance; always use that instance.
**Prevention:** Use the return value of `Model::create()` or `save()` for subsequent operations. Do not re-query based on input parameters for a just-created resource.

## 2026-02-04 - Missing Rate Limiting on Contact Form
**Vulnerability:** The contact form submission endpoint (`/contatos`) lacked rate limiting, allowing an attacker to flood the application with requests, potentially causing Denial of Service (DoS) and spamming the configured email addresses.
**Learning:** `Route::resource` does not apply rate limiting by default. Sensitive endpoints, especially those triggering emails or heavy processing, require explicit `throttle` middleware.
**Prevention:** Apply specific rate limiting middleware (e.g., `throttle:3,1`) to public-facing form submission routes.

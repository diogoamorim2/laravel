## 2024-05-22 - CSRF via GET State Change
**Vulnerability:** Contact form submission was using GET request to `/contatos/create`, which persisted data to the database and sent emails.
**Learning:** The resource controller's `create` method was being used as a processing endpoint instead of just a display endpoint, bypassing CSRF protection (since GET requests are typically exempt) and violating HTTP semantics.
**Prevention:** Ensure state-changing actions always use POST/PUT/DELETE methods. Verify `Route::resource` methods are used for their intended purpose (create=show form, store=save data).

## 2024-05-22 - IDOR in Store Method
**Vulnerability:** The `store` method created a new contact but then re-fetched the contact using `Contato::findOrFail($request->id)`. This allowed an attacker to inject an arbitrary `id` in the request, causing the application to send sensitive emails to/about a different user (the victim) instead of the newly created contact.
**Learning:** Never trust user input (`$request->id`) to identify a resource that was just created. The `create()` method returns the model instance; always use that instance.
**Prevention:** Use the return value of `Model::create()` or `save()` for subsequent operations. Do not re-query based on input parameters for a just-created resource.

## 2026-02-03 - Implicit Redirect Dependencies in Tests
**Vulnerability:** Broken access control (unthrottled endpoint) and broken endpoint (`/user/1`).
**Learning:** Adding security middleware (`throttle`) and refactoring routes exposed brittle tests that relied on implicit `redirect()->back()` behavior. Tests were failing because they didn't simulate the `Referer` header (`from()`), causing `back()` to default to root instead of the expected index page.
**Prevention:** When writing tests for controllers that use `redirect()->back()`, explicitly set the "from" URL using `$this->from($url)->post(...)` to ensure deterministic behavior independent of test execution order or route definition.

## 2026-05-24 - Missing Security Headers
**Vulnerability:** The application lacked standard security headers (`X-Frame-Options`, `X-Content-Type-Options`, `X-XSS-Protection`, `Referrer-Policy`), increasing exposure to clickjacking, MIME sniffing, and XSS.
**Learning:** Laravel framework does not include these headers by default in the base middleware stack. Explicit middleware is required to harden the HTTP response.
**Prevention:** Implement a global middleware (e.g., `EnsureSecurityHeaders`) to inject these headers on every response.

## 2026-05-24 - Improper Integer Validation for Phone Numbers
**Vulnerability:** The `ContatoUpdateRequest` validated phone numbers as integers with `max:10000`, causing a Denial of Service for valid updates (since real phone numbers exceed this value). It also lacked `max` length limits on string fields.
**Learning:** Using `integer` validation rule with `max` checks numeric value, not digit count. For phone numbers, always use `string` validation with regex or length constraints, as they are identifiers, not mathematical numbers.
**Prevention:** Audit validation rules for semantic correctness. Use `string` for phone numbers and ensure `max` rules align with database column sizes (e.g., `varchar(255)`).

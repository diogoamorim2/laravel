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

## 2026-05-24 - Reverse Tabnabbing Vulnerability
**Vulnerability:** Multiple external links using `target="_blank"` were missing `rel="noopener noreferrer"`, exposing users to potential reverse tabnabbing attacks where the target page could manipulate the window.opener.
**Learning:** While modern browsers imply `noopener`, explicitly including it along with `noreferrer` is a critical defense-in-depth practice. Malformed HTML attributes (e.g., `target=”blank”`) can also bypass security checks if not caught.
**Prevention:** Enforce the presence of `rel="noopener noreferrer"` on all `target="_blank"` links via automated linting or CI/CD checks.

## 2026-06-15 - Integer Schema for Phone Numbers
**Vulnerability:** Despite validation rules enforcing string format, the database schema defined `telefone_fixo` and `telefone_celular` as `integer`. This caused data loss (stripping leading zeros) and potential integer overflow on strictly-typed database engines for valid phone numbers.
**Learning:** Validation rules are the first line of defense, but the database schema is the final enforcer. Mismatches between validation (string) and schema (integer) lead to silent data corruption or runtime errors. Phone numbers are strings, not integers.
**Prevention:** Always define phone number columns as `string` (varchar) in migrations. Verify schema types match expected data format, especially for non-mathematical numeric identifiers.

## 2026-06-21 - Honeypot Spam Protection Pattern
**Vulnerability:** Public forms (Contact, Newsletter) were susceptible to automated spam bot submissions.
**Learning:** Simple CAPTCHAs or rate limiting (per IP) are insufficient against distributed botnets. Hidden honeypot fields are effective low-friction deterrents.
**Prevention:** Use a hidden input field named deceptively (e.g., 'fax') and validate it with the 'prohibited' rule in FormRequests.

## 2026-02-07 - Broken Access Control in Resource Controller
**Vulnerability:** The `ContatoController` relied on manual `Auth::check()` logic within methods to protect administrative actions (`index`, `show`, `edit`), but fell back to rendering the public homepage instead of denying access. This allowed unauthenticated users to execute controller logic (like querying the database) and potentially receive sensitive data passed to the view (Broken Access Control).
**Learning:** Manual checks inside controller methods are error-prone and can lead to "fail-open" or "fail-confusing" states where the route returns 200 OK instead of 403/302. Relying on `Route::resource` without explicit middleware exposes all standard actions by default.
**Prevention:** Always use `middleware('auth')` on the route definition for administrative resources. Use `only()` or `except()` to strictly define which methods are exposed and protected. Ensure `auth` middleware has a valid `login` route to redirect to.

## 2024-05-28 - DoS via Array Payload on Pagination Parameter
**Vulnerability:** Passing an array instead of a string/integer to the `page` query parameter (e.g., `?page[]=1`) caused a fatal `TypeError` in PHP 8+ when mathematical operations were performed on the request input `(request()->input('page', 1) - 1) * 5`. This resulted in an unhandled 500 Internal Server Error, creating a Denial of Service (DoS) risk.
**Learning:** Input from `request()->input()` can be an array if the client sends array notation in the query string or body. Mathematical operations on arrays without explicit casting result in strict type errors in modern PHP.
**Prevention:** Always explicitly cast HTTP request inputs that are expected to be numeric before performing mathematical operations (e.g., `(int) request()->input('page', 1)`). Tests should assert the absence of `\TypeError::class` to specifically catch this vulnerability.
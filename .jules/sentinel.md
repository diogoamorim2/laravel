## 2024-05-23 - CSP Tightening
**Vulnerability:** The Content Security Policy (CSP) used a wildcard `https:` in `script-src`, allowing execution of scripts from any HTTPS domain. This weakens protection against XSS if an attacker can inject a script tag pointing to a malicious CDN or their own HTTPS server.
**Learning:** Default or example CSPs often use `https:` for convenience to support CDNs without listing them all. However, modern security requires whitelisting specific trusted domains.
**Prevention:** Avoid `https:` in `script-src`. Always list specific allowed domains (e.g., `https://www.google.com`) or use nonces/hashes. Periodically review and tighten CSP headers.

## 2024-05-24 - Honeypot Audit Logging
**Vulnerability:** While a honeypot field (`fax`) existed to reject spam submissions, these attempts were silently discarded (via validation error). This prevented visibility into the volume and source of automated attacks.
**Learning:** Security controls like honeypots or rate limits should not just block attacks but also log them. Without logs, we cannot analyze attack patterns or block persistent offenders at the network level.
**Prevention:** Implement explicit logging for security control failures (e.g., honeypot triggers, validation failures on critical fields). Use structured logging to capture context like IP and User-Agent.

## 2024-05-25 - Email Rate Limiting
**Vulnerability:** The contact form was vulnerable to email bombing because rate limiting was only IP-based (`throttle:3,1`). A distributed attack could spam a single email address.
**Learning:** Public forms that trigger emails to user-input addresses must have rate limiting on the *recipient* address, not just the sender IP.
**Prevention:** Implement `RateLimiter` keyed by the recipient email address in addition to standard IP-based throttling.

## 2024-05-26 - Mass Assignment Protection
**Vulnerability:** The public contact form allowed mass assignment of the `ativo` field, which is an internal flag used to mark contacts as active/inactive. Although defaulting to true, enabling users to set it to false (0) is a security risk (e.g. hiding spam).
**Learning:** Even if a field has a default value in the database, including it in validation rules (`nullable|bool`) allows it to be mass-assigned from user input.
**Prevention:** Strictly limit validation rules in FormRequests to only those fields that are exposed in the HTML form and are safe for user input. Remove internal flags from validation rules so they are stripped by `$request->validated()`.

## 2024-05-27 - Input Sanitization Layer
**Vulnerability:** User input was only relying on output encoding to prevent XSS. Stored data contained raw HTML if submitted, posing a risk if data is ever used in non-escaped contexts.
**Learning:** `FormRequest` validation rules do not alter the input data. To sanitize data, one must explicitly use `prepareForValidation`.
**Prevention:** Implement `prepareForValidation` in `FormRequest` classes to sanitize string inputs (e.g., using `strip_tags`) before they are validated and stored.

## 2024-05-28 - Array Input Denial of Service (DoS)
**Vulnerability:** The application crashed with a 500 TypeError when an array payload (e.g., `nome[]=value`) was submitted to a field that was expected to be a string. This occurred because `strip_tags()` does not accept arrays, and the input was only checked against `!== null` before sanitization.
**Learning:** PHP's type strictness on native functions like `strip_tags` can turn minor type juggling into fatal errors. Validating input types *before* sanitizing is critical to prevent DoS via payload manipulation.
**Prevention:** Always verify input types explicitly before applying string operations. Use `is_string($this->input($field))` instead of `$this->input($field) !== null` in `prepareForValidation` loops. Let the validator handle type rejections safely.

## 2026-03-06 - Security Headers Tightening
**Vulnerability:** The application was missing the `X-Permitted-Cross-Domain-Policies` header, and the `X-Powered-By` header was exposing the PHP version to attackers.
**Learning:** Default PHP and Laravel setups might leak version information or miss specific restrictive cross-domain headers, providing attackers with unnecessary fingerprinting data.
**Prevention:** Always remove `X-Powered-By` at the application entry point (e.g., `public/index.php`) and enforce strict security headers via middleware, explicitly denying cross-domain policies like Flash/PDF unless explicitly required.
## 2024-05-29 - Server Information Leakage Prevention
**Vulnerability:** The application was emitting the `X-Powered-By: PHP/8.x.x` HTTP response header, which exposes specific version information about the underlying technology stack. Additionally, it was missing `X-Permitted-Cross-Domain-Policies: none`.
**Learning:** Exposing technology versions aids attackers in targeting known vulnerabilities for that specific stack version. Relying solely on middleware to strip headers like `X-Powered-By` may be insufficient if the server (PHP/Apache/Nginx) adds them at the infrastructure layer or before the framework is fully bootstrapped.
**Prevention:** Explicitly remove the `X-Powered-By` header at the earliest possible entry point (e.g., `public/index.php` using `header_remove()`) and within framework middleware. Ensure all standard security headers, including `X-Permitted-Cross-Domain-Policies`, are explicitly set.
## 2026-03-06 - Error Handling Stack Trace Leak
**Vulnerability:** The `ContatoController` was catching exceptions during the contact creation and email sending process and logging the entire stack trace using `$e->getTraceAsString()`. Logging full stack traces in general production logs, especially when triggered by user input, can lead to information leakage about the application's internal structure and dependencies if logs are ever exposed or improperly handled.
**Learning:** While stack traces are useful for debugging, they should be handled carefully and typically restricted to dedicated error tracking systems (like Sentry or Bugsnag) rather than written as raw text to standard application logs where they might be exposed.
**Prevention:** Avoid logging full stack traces in standard application logs. Log the exception message (`$e->getMessage()`) and relevant context (like user IP or ID), and rely on a dedicated exception handler/tracker for detailed stack traces.
## 2026-03-06 - Stack Trace Exposure in Logs
**Vulnerability:** Exception stack traces were being written directly to logs (using `$e->getTraceAsString()`) in the `ContatoController@store` method upon failures.
**Learning:** Writing full stack traces to production logs can inadvertently expose sensitive information such as server file paths, internal component structures, and potentially environment variables or database connection strings present in stack frames.
**Prevention:** Do not use `getTraceAsString()` or `getTrace()` when logging production exceptions unless strictly managed within a secure logging channel. The `$e->getMessage()` method usually provides enough context for debugging without leaking structural information.
## 2024-05-29 - Stack Trace Information Disclosure
**Vulnerability:** When a contact form submission failed, the exception's full stack trace (`$e->getTraceAsString()`) was written directly to standard application logs.
**Learning:** Stack traces can expose sensitive information about the application's internal file structure, dependencies, database queries, and environment setup. If logs are compromised, leaked, or temporarily accessible via a vulnerability (like path traversal), this internal knowledge aids attackers.
**Prevention:** To prevent information leakage, full stack traces should not be written to standard, potentially broad-access logs in production. Log only necessary context (like `$e->getMessage()`, IP, User-Agent) and rely on dedicated, secure error tracking systems (like Sentry or Flare) to handle detailed stack traces.

## 2024-05-18 - [Fix redundant/insecure logging in Controller actions]
**Vulnerability:** Duplicate logging operations in `update` and `destroy` actions inside `ContatoController`. Most of the logs were missing important audit details like the user's `ip` address.
**Learning:** This implies a pattern where log statements are copy-pasted or added iteratively without refactoring the old ones. Incomplete audit logs (missing IP addresses) reduce visibility into potential abuse by authenticated users.
**Prevention:** Ensure that audit logs containing a consistent format (`id`, `user_id`, `ip`) are consolidated into a single informative statement per critical action.

## 2024-04-29 - Array Payload DoS in Pagination Math
**Vulnerability:** The `ContatoController@index` method crashed with a 500 `TypeError` when an array payload (e.g., `?page[]=1`) was submitted, because it attempted to perform arithmetic operations on the unvalidated `page` input (`(request()->input('page', 1) - 1) * 5`).
**Learning:** PHP 8+ strictness causes arithmetic operations with arrays to throw a fatal `TypeError`. Native Laravel pagination handles arrays safely, but custom logic relying on raw request inputs is vulnerable.
**Prevention:** Always explicitly cast HTTP query parameters (e.g., using `(int)`) when used in mathematical operations or string concatenations to prevent Denial of Service via array payloads.

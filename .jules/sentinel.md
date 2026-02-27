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

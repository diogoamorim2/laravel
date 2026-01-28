## 2026-01-28 - GET-based State Change Vulnerability
**Vulnerability:** A `create` controller method was performing database writes via GET request, bypassing CSRF protection.
**Learning:** Developers sometimes use `create` (standard GET route for forms) to process logic intended for `store`, mistakenly mixing display and persistence logic.
**Prevention:** Ensure GET routes are idempotent. Strictly separate "show form" (GET) and "process form" (POST/PUT) actions.

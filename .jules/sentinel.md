# Sentinel's Journal

## 2024-05-24 - CSRF and Insecure Method Fix
**Vulnerability:** Contact creation via GET request (CSRF) and Missing Auth Middleware.
**Learning:** The application was using a GET route (`create`) to modify state (save contact), making it vulnerable to CSRF and unintentional duplicate submissions. It also relied on "View-Level Authorization" (`Auth::check()` in controller) instead of proper Middleware, leaving routes technically open. The Base Controller was also missing Laravel's `BaseController` inheritance, breaking middleware functionality.
**Prevention:** Always use POST/PUT/DELETE for state-changing actions. Use `auth` middleware for protected routes instead of manual checks in controller methods. Ensure Controllers extend the correct Base Controller.

## 2024-05-22 - Focus Styles & Accessibility
**Learning:** The application explicitly removed focus outlines (`outline: 3px solid transparent`) without providing an alternative, likely for aesthetic reasons. This completely breaks keyboard navigation.
**Action:** Always check `public/css/style.css` for `outline: none` or `outline: transparent` on `:focus` and ensure `:focus-visible` is implemented as a replacement.

## 2024-05-23 - Verifying Form Loading States
**Learning:** Verifying transient "loading" states (like disabled buttons on submit) is difficult because the page reloads/redirects quickly.
**Action:** Use Playwright's `page.route(url, lambda route: route.abort())` to intercept and freeze the request, preventing navigation and allowing verification of the "loading" UI state.

## 2026-02-04 - Malformed HTML Structure
**Learning:** `index.blade.php` (and potentially others) defines `<body>` outside of `@section` directives while extending a layout that has `<html>`. This causes `<body>` to be rendered *before* the doctype, confusing headless browsers during verification.
**Action:** When writing Playwright verification scripts, use `page.evaluate("document.body.innerHTML")` to inspect content if screenshots are blank, and be aware that the DOM tree might be reconstructed unexpectedly by the browser.

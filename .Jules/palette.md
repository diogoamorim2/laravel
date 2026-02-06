## 2024-05-22 - Focus Styles & Accessibility
**Learning:** The application explicitly removed focus outlines (`outline: 3px solid transparent`) without providing an alternative, likely for aesthetic reasons. This completely breaks keyboard navigation.
**Action:** Always check `public/css/style.css` for `outline: none` or `outline: transparent` on `:focus` and ensure `:focus-visible` is implemented as a replacement.

## 2024-05-23 - Verifying Form Loading States
**Learning:** Verifying transient "loading" states (like disabled buttons on submit) is difficult because the page reloads/redirects quickly.
**Action:** Use Playwright's `page.route(url, lambda route: route.abort())` to intercept and freeze the request, preventing navigation and allowing verification of the "loading" UI state.

## 2024-05-24 - Server-side Validation Feedback
**Learning:** The contact form relied solely on browser validation (`required`) or silent server validation (redirect back without errors), leaving users confused if client-side validation failed or was bypassed.
**Action:** Always verify that `@error` directives are present in Blade templates for all form inputs, and that corresponding CSS classes (e.g., `.is-invalid`) exist to visually communicate the error state.

## 2024-05-25 - Verifying Transient Loading States with Overlays
**Learning:** This project uses a `.fade` overlay (1s duration) that obscures content on load. Playwright verification scripts must handle this by removing the element or waiting. Also, verify form loading states by preventing default submission via JS injection if intercepting network requests is insufficient or if the page unloads too quickly.
**Action:** In Playwright scripts: `page.evaluate("if(document.querySelector('.fade')) document.querySelector('.fade').remove()")` and prevent form submission with `e.preventDefault()` to inspect button states.

## 2024-05-22 - Focus Styles & Accessibility
**Learning:** The application explicitly removed focus outlines (`outline: 3px solid transparent`) without providing an alternative, likely for aesthetic reasons. This completely breaks keyboard navigation.
**Action:** Always check `public/css/style.css` for `outline: none` or `outline: transparent` on `:focus` and ensure `:focus-visible` is implemented as a replacement.

## 2024-05-23 - Verifying Form Loading States
**Learning:** Verifying transient "loading" states (like disabled buttons on submit) is difficult because the page reloads/redirects quickly.
**Action:** Use Playwright's `page.route(url, lambda route: route.abort())` to intercept and freeze the request, preventing navigation and allowing verification of the "loading" UI state.

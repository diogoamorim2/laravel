## 2024-05-22 - Focus Styles & Accessibility
**Learning:** The application explicitly removed focus outlines (`outline: 3px solid transparent`) without providing an alternative, likely for aesthetic reasons. This completely breaks keyboard navigation.
**Action:** Always check `public/css/style.css` for `outline: none` or `outline: transparent` on `:focus` and ensure `:focus-visible` is implemented as a replacement.

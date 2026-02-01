## 2024-05-22 - Focus Styles & Accessibility
**Learning:** The application explicitly removed focus outlines (`outline: 3px solid transparent`) without providing an alternative, likely for aesthetic reasons. This completely breaks keyboard navigation.
**Action:** Always check `public/css/style.css` for `outline: none` or `outline: transparent` on `:focus` and ensure `:focus-visible` is implemented as a replacement.

## 2024-05-24 - Inline Scripts for Interactive States
**Learning:** This project lacks a unified frontend build process (Vite is configured but not used in layout), necessitating inline scripts/styles for interactive components like loading states.
**Action:** When adding interactive UI elements, prefer self-contained inline logic within the Blade template or manually linked assets over assuming a compiled JS bundle is available.

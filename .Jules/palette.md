## 2026-01-28 - Invisible Focus State
**Learning:** This repo's base CSS (`style.css`) explicitly removed focus rings (`outline: transparent`) without replacing them, making the site inaccessible to keyboard users.
**Action:** Always check `style.css` or global styles for `:focus` resets and restore them using `:focus-visible` or theme colors immediately.

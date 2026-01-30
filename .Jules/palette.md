## 2024-05-23 - Focus Indicator Anti-Pattern
**Learning:** Found explicit `outline: 3px solid transparent` on `:focus` in `public/css/style.css`. This completely removes focus indicators for keyboard users, making the site inaccessible.
**Action:** Always check for `outline: none` or transparent outlines in global CSS. Replace with `:focus-visible` to balance design (mouse users) and accessibility (keyboard users).

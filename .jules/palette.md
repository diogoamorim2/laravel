## 2024-05-24 - Floating Action Button Focus States
**Learning:** Floating action buttons inherit global generic focus outlines that may not fit their circular design. Explicitly defining an outline ring with `border-radius: 50%` ensures the focus indicator matches the button geometry.
**Action:** Always apply `border-radius: 50%` alongside an explicit `outline` and `outline-offset` for circular floating action buttons to ensure optimal keyboard accessibility styling.

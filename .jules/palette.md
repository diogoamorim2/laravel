
## 2024-04-28 - Explicit focus-visible styling for circular floating action buttons
**Learning:** Floating action buttons with circular shapes need explicit `border-radius: 50%` in their `:focus-visible` rules to ensure the focus outline matches the button shape, rather than defaulting to a rectangular outline.
**Action:** Always add explicit `border-radius: 50%` along with `outline-offset` when defining `:focus-visible` states for circular floating buttons.

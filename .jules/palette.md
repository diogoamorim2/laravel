## 2024-05-15 - Explicit Focus Styles for Circular Buttons
**Learning:** Circular floating action buttons inherit default rectangular focus rings which look disconnected and break the visual design during keyboard navigation.
**Action:** Always provide explicit `:focus-visible` styles with `border-radius: 50%` and an appropriate `outline-offset` for circular elements to maintain aesthetic consistency for keyboard users.

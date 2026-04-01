
## 2026-03-22 - Floating Action Button Focus States
**Learning:** Floating action buttons (like chat widgets or "back to top" buttons) often inherit default circular styles but miss explicit `:focus-visible` styles. Because they are circular, standard square focus rings look broken or are entirely invisible, failing keyboard accessibility.
**Action:** Always add a distinct `:focus-visible` state with a matching `border-radius: 50%`, `outline: 3px solid`, and `outline-offset` to circular floating action buttons to ensure clear and aesthetically pleasing keyboard focus indicators.

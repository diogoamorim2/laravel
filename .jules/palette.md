## 2024-05-19 - Explicit Focus-Visible for Floating Action Buttons
**Learning:** Floating action buttons with circular shapes (like back-to-top and WhatsApp links) often inherit default rectangular focus outlines which look broken, or lack focus outlines entirely if only `:hover` states are styled, making them inaccessible to keyboard users.
**Action:** Always provide explicit `:focus-visible` styling with `border-radius: 50%;` and a distinct outline ring (e.g. `outline-offset`) to maintain the circular shape and ensure keyboard accessibility.

## 2025-01-20 - Ensure Outline Conforms to Circular Floating Elements
**Learning:** Custom-shaped floating elements like `.whatsapp-button` and `.btn-back-to-top` may not show proper focus rings or their focus rings may be improperly shaped (square around a circle).
**Action:** Always add explicit `:focus-visible` with matching `border-radius: 50%;` and `outline-offset` to ensure the focus indicator properly contours circular floating action buttons, ensuring both accessibility and a polished look.

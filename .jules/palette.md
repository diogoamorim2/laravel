## 2024-05-24 - Circular Focus Rings for Floating Action Buttons
**Learning:** Floating action buttons (FABs) often rely on `:hover` styles, omitting clear focus states, which hurts keyboard accessibility. Standard rectangular focus rings on circular buttons look broken and disjointed.
**Action:** Always apply explicit `:focus-visible` styling with `border-radius: 50%` and `outline-offset` to circular buttons (like WhatsApp or back-to-top buttons) to ensure focus rings match the shape and provide adequate accessibility.

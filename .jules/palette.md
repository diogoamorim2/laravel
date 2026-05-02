## 2024-05-02 - Add distinct focus rings to circular floating action buttons
**Learning:** Floating action buttons (like WhatsApp or back-to-top) often lack adequate focus indicators when relying solely on default outlines or hover states, making keyboard navigation difficult.
**Action:** Always include explicit `:focus-visible` styling with a distinct outline ring (e.g., `outline-offset: 4px; border-radius: 50%;`) to ensure adequate keyboard accessibility and match the circular button shape.

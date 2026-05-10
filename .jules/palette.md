## 2024-05-03 - Floating Action Buttons Keyboard Focus
**Learning:** Standard `:focus` states often look poor on circular floating action buttons (like WhatsApp or back-to-top buttons) because the default square outline clashes with the round shape, leading developers to rely only on `:hover`.
**Action:** Always add explicit `:focus-visible` styles with `outline-offset` and `border-radius: 50%` to circular buttons to ensure adequate keyboard accessibility while respecting the shape geometry.
## 2024-05-10 - Honeypot Field Accessibility
**Learning:** Honeypot fields intended for spam prevention can cause severe UX and accessibility issues if not properly hidden. Screen readers may announce them, confusing visually impaired users, and legitimate users might see and interact with them, inadvertently failing form validation.
**Action:** Always add the `.sr-only` class and `aria-hidden="true"` directly in the HTML template for honeypot fields to ensure they are visually hidden and entirely removed from the accessibility tree without relying on JavaScript.

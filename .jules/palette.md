## 2024-05-03 - Floating Action Buttons Keyboard Focus
**Learning:** Standard `:focus` states often look poor on circular floating action buttons (like WhatsApp or back-to-top buttons) because the default square outline clashes with the round shape, leading developers to rely only on `:hover`.
**Action:** Always add explicit `:focus-visible` styles with `outline-offset` and `border-radius: 50%` to circular buttons to ensure adequate keyboard accessibility while respecting the shape geometry.
## 2024-05-12 - Hide Honeypot Fields Accessibly
**Learning:** Honeypot fields without explicit utility classes like `.sr-only` will become visible to users, and without `aria-hidden="true"`, they will be announced by screen readers, confusing legitimate users and causing form validation failures.
**Action:** Always visually hide honeypot fields and remove them from the accessibility tree using the existing `.sr-only` class and `aria-hidden="true"` directly in HTML templates to avoid Flash of Unstyled Content (FOUC).

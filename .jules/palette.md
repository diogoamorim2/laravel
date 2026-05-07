## 2024-05-03 - Floating Action Buttons Keyboard Focus
**Learning:** Standard `:focus` states often look poor on circular floating action buttons (like WhatsApp or back-to-top buttons) because the default square outline clashes with the round shape, leading developers to rely only on `:hover`.
**Action:** Always add explicit `:focus-visible` styles with `outline-offset` and `border-radius: 50%` to circular buttons to ensure adequate keyboard accessibility while respecting the shape geometry.
## 2026-05-07 - Honeypot Field Accessibility
**Learning:** Honeypot fields intended for bots can accidentally trap legitimate screen reader users or keyboard navigators if they are not explicitly hidden from the accessibility tree, causing them to fail form validation.
**Action:** Always apply `.sr-only` and `aria-hidden="true"` to honeypot inputs directly in HTML to ensure they are visually hidden and ignored by assistive technologies without causing Flash of Unstyled Content (FOUC).

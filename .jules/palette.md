## 2024-04-25 - Circular Buttons Focus Accessibility
**Learning:** Default square focus rings on circular floating action buttons look broken or are invisible, which reduces accessibility for keyboard users.
**Action:** Always provide explicit `:focus-visible` styling with a distinct outline ring (`outline: 3px solid var(--primaryColor); outline-offset: 4px; border-radius: 50%;`) for circular floating elements.

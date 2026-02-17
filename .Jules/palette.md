## 2024-05-22 - Navigation Active States
**Learning:** Users were getting lost in the navigation because there was no visual indication of the current page. Consistent navigation structure across pages is crucial for maintainability and user orientation.
**Action:** Extracted navigation to a partial and implemented route-based active states.

## 2024-05-24 - Accessible CSS-Only Mobile Menu
**Learning:** The "checkbox hack" for mobile menus often uses `visibility: hidden` on the input, removing it from the accessibility tree and preventing keyboard navigation.
**Action:** Replaced `visibility: hidden` with `appearance: none` and `background: transparent` on the input. This keeps the element focusable while hiding the default checkbox UI, allowing keyboard users to toggle the menu. Added `:focus-visible` styles for clarity.

## 2026-02-16 - Character Counter on Textarea
**Learning:** Users typing long messages into a `maxlength` restricted textarea without feedback can lose context and get frustrated when input stops.
**Action:** Implemented a simple character counter (`X/2000`) and associated it with the textarea using `aria-describedby` for accessibility, providing both visual and assistive technology feedback.

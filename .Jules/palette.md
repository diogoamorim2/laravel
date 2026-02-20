## 2024-05-22 - Navigation Active States
**Learning:** Users were getting lost in the navigation because there was no visual indication of the current page. Consistent navigation structure across pages is crucial for maintainability and user orientation.
**Action:** Extracted navigation to a partial and implemented route-based active states.

## 2024-05-24 - Accessible CSS-Only Mobile Menu
**Learning:** The "checkbox hack" for mobile menus often uses `visibility: hidden` on the input, removing it from the accessibility tree and preventing keyboard navigation.
**Action:** Replaced `visibility: hidden` with `appearance: none` and `background: transparent` on the input. This keeps the element focusable while hiding the default checkbox UI, allowing keyboard users to toggle the menu. Added `:focus-visible` styles for clarity.

## 2026-02-16 - Character Counter on Textarea
**Learning:** Users typing long messages into a `maxlength` restricted textarea without feedback can lose context and get frustrated when input stops.
**Action:** Implemented a simple character counter (`X/2000`) and associated it with the textarea using `aria-describedby` for accessibility, providing both visual and assistive technology feedback.

## 2026-03-02 - Semantic Breadcrumbs
**Learning:** Hardcoded links like `index.html` in breadcrumbs break when routing structure changes, and non-semantic breadcrumbs (using `div` instead of `nav`) are confusing for screen reader users.
**Action:** Implemented a reusable `.breadcrumb` CSS class and refactored breadcrumbs to use `<nav aria-label="Breadcrumb">` and `<ol>` for better accessibility and maintainability.

## 2026-03-02 - Breadcrumb Visual Regression
**Learning:** Using common class names like `.breadcrumb` can inadvertently inherit conflicting styles from CSS frameworks (like Bootstrap), causing accessibility issues (e.g., white text on white background).
**Action:** Always verify new components against potential framework conflicts and explicitly override properties (e.g., `background-color: transparent`) to ensure consistent styling.

## 2026-03-02 - Interactive Service Previews
**Learning:** Static service highlights on landing pages (icon + title) frustrate users who expect them to be clickable entry points to detailed content.
**Action:** Wrapped service highlights in anchor tags linking to specific sections on the services page, using `display-block` to maximize the hit area and `aria-label` to provide context for screen readers.

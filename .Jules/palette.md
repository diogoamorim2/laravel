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

## 2026-03-03 - Semantic Heading Structure & Anchor Focus
**Learning:** Using `<span>` elements styled as headings creates a visual hierarchy but breaks the document outline for screen reader users, making navigation difficult. Similarly, using empty `<img>` tags or anchors for scroll targets is semantically incorrect and can trap focus.
**Action:** Refactored headings to use semantic `<h3>`/`<h4>` tags while maintaining visual styling with classes. Replaced image-based anchors with `<div>` containers having `id` and `tabindex="-1"` to ensure proper focus management and semantic correctness.

## 2026-03-03 - Focus Trap in Animated Menus
**Learning:** Animating only `height` to hide a navigation menu leaves its internal links focusable in the DOM, creating a "ghost focus" trap where keyboard users traverse invisible elements.
**Action:** Implemented `visibility: hidden` on the closed state with a transition delay to allow the height animation to finish, ensuring links are removed from the accessibility tree when the menu is collapsed.

## 2026-02-25 - Invalid List Semantics and Global Style Conflicts
**Learning:** Grouping list items under a `<strong>` heading directly inside a `<ul>` creates invalid HTML and confuses screen readers. Also, applying global styles to semantic tags like `<nav>` prevents their reuse in other contexts (e.g., sidebar navigation).
**Action:** Refactored invalid lists into semantic blocks (`div` with `strong` headings and nested `ul`) and used `role="navigation"` on a `div` for sidebar navigation to avoid inheriting global `nav` styles while maintaining accessibility.

## 2026-03-03 - Inline Validation Feedback
**Learning:** Screen reader users will not know an input has an error if the error message is only shown visually. `aria-invalid` must be used to announce the invalid state, and `aria-describedby` must link the input to the element containing the specific error message text.
**Action:** Always include `aria-invalid` and `aria-describedby` referencing the error message ID when rendering inline form validation errors (e.g., in Blade templates using `@error`).

## 2026-03-03 - Ambiguous Link Context
**Learning:** Generic link text like "Saiba mais" or "Read more" makes navigation difficult for screen reader users who often tab through links out of context.
**Action:** Always provide descriptive `aria-label` attributes for ambiguous links to ensure the destination or purpose is clear to assistive technologies.

## 2026-03-11 - Decorative Icon Announcements
**Learning:** Using decorative icon fonts (like Bootstrap Icons) directly with `<i>` tags can cause screen readers to read out confusing CSS class names or unhelpful characters, disorienting visually impaired users.
**Action:** Always add `aria-hidden="true"` to decorative `<i>` tags to explicitly hide them from the accessibility tree, especially when they are accompanied by visible text or `aria-label` attributes on their parent elements.

## 2026-03-03 - Circular Button Focus Rings
**Learning:** Default square focus rings on circular floating action buttons (like WhatsApp or Back-to-Top) look broken and unpolished.
**Action:** Implemented explicit `:focus-visible` styles with `border-radius: 50%`, `outline: 3px solid`, and `outline-offset: 4px` to create a visually appealing, accessible focus ring that respects the button's shape.

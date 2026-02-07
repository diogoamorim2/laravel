## 2024-05-23 - HTML Structure & Blade Layout Refactor
**Learning:** The application's Blade layout (`layout.default`) was missing the `<body>` tag, forcing child views to define it. This led to inconsistent HTML structure and potential rendering issues, as content (like the header) could be rendered outside the `<body>`.
**Action:** Centralized the `<body>` tag in the main layout file. Ensure all child views use `@section('content')` to inject content into the layout's body. This improves maintainability and ensures valid HTML structure, which is crucial for LCP and SEO.

## 2024-05-23 - Controller Return Type Strictness
**Learning:** `ContatoController::create` was typed to return `RedirectResponse` but returned a `View`, causing 500 errors in tests (and likely in production if strict types were enforced).
**Action:** corrected the return type to `View`. Always verify return type hints against the actual return value, especially when refactoring or writing tests.

## 2024-05-23 - YouTube Facade Lazy Loading
**Learning:** Inline `style='background-image: ...'` prevents native lazy loading. Replacing it with an `<img loading='lazy'>` tag inside the container (with `object-fit: cover`) allows the browser to defer loading off-screen images, improving initial page load performance.
**Action:** Audit other components for similar patterns where background images are used purely for presentation of content that could be lazy-loaded.

## 2024-05-23 - HTML Structure & Blade Layout Refactor
**Learning:** The application's Blade layout (`layout.default`) was missing the `<body>` tag, forcing child views to define it. This led to inconsistent HTML structure and potential rendering issues, as content (like the header) could be rendered outside the `<body>`.
**Action:** Centralized the `<body>` tag in the main layout file. Ensure all child views use `@section('content')` to inject content into the layout's body. This improves maintainability and ensures valid HTML structure, which is crucial for LCP and SEO.

## 2024-05-23 - Controller Return Type Strictness
**Learning:** `ContatoController::create` was typed to return `RedirectResponse` but returned a `View`, causing 500 errors in tests (and likely in production if strict types were enforced).
**Action:** corrected the return type to `View`. Always verify return type hints against the actual return value, especially when refactoring or writing tests.

## 2026-02-08 - Lazy Loading YouTube Thumbnails
**Learning:** Background images cannot be natively lazy loaded by the browser. Replacing `background-image` with an `<img>` tag using `object-fit: cover` and `loading="lazy"` achieves the same visual result but significantly improves initial page load performance by deferring the download of off-screen images.
**Action:** When optimizing image-heavy components (like video facades), prefer `<img>` tags over background images to leverage native lazy loading. Ensure proper CSS (absolute positioning, object-fit) to maintain the layout.

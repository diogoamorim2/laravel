## 2024-05-23 - HTML Structure & Blade Layout Refactor
**Learning:** The application's Blade layout (`layout.default`) was missing the `<body>` tag, forcing child views to define it. This led to inconsistent HTML structure and potential rendering issues, as content (like the header) could be rendered outside the `<body>`.
**Action:** Centralized the `<body>` tag in the main layout file. Ensure all child views use `@section('content')` to inject content into the layout's body. This improves maintainability and ensures valid HTML structure, which is crucial for LCP and SEO.

## 2024-05-23 - Controller Return Type Strictness
**Learning:** `ContatoController::create` was typed to return `RedirectResponse` but returned a `View`, causing 500 errors in tests (and likely in production if strict types were enforced).
**Action:** corrected the return type to `View`. Always verify return type hints against the actual return value, especially when refactoring or writing tests.

## 2026-02-08 - Lazy Loading YouTube Thumbnails
**Learning:** Background images cannot be natively lazy loaded by the browser. Replacing `background-image` with an `<img>` tag using `object-fit: cover` and `loading="lazy"` achieves the same visual result but significantly improves initial page load performance by deferring the download of off-screen images.
**Action:** When optimizing image-heavy components (like video facades), prefer `<img>` tags over background images to leverage native lazy loading. Ensure proper CSS (absolute positioning, object-fit) to maintain the layout.
## 2024-05-23 - YouTube Facade Lazy Loading
**Learning:** Inline `style='background-image: ...'` prevents native lazy loading. Replacing it with an `<img loading='lazy'>` tag inside the container (with `object-fit: cover`) allows the browser to defer loading off-screen images, improving initial page load performance.
**Action:** Audit other components for similar patterns where background images are used purely for presentation of content that could be lazy-loaded.

## 2026-02-09 - Preconnecting to YouTube Domains
**Learning:** Lazy loading video thumbnails reduces initial payload, but playback start time still suffers from DNS and connection latency. Adding `preconnect` and `dns-prefetch` hints for the video host (e.g., `youtube.com`, `i.ytimg.com`) significantly improves perceived responsiveness on interaction.
**Action:** Audit all third-party integrations (maps, chat widgets, video players) and add appropriate resource hints to the `<head>` to preload connections.

## 2026-02-12 - LCP Preloading & Third-Party Preconnects
**Learning:** Background images defined in CSS (e.g., `style="background-image: url(...)"`) are not discovered by the browser's preload scanner, delaying the Largest Contentful Paint (LCP). Additionally, third-party iframes (like Google Maps) introduce significant DNS/TCP latency.
**Action:** explicitly preload LCP background images using `<link rel="preload" as="image" href="...">` in the `<head>`. For heavy third-party integrations (Maps, YouTube), add `<link rel="preconnect">` to their respective domains to speed up the connection phase.

## 2026-02-13 - Route Caching Optimization
**Learning:** Defining routes using Closures in `routes/web.php` prevents Laravel from caching routes (`php artisan route:cache`), which significantly degrades boot performance in production.
**Action:** Refactor all closure-based routes into dedicated controllers (e.g., `PageController`). This enables route caching, resulting in faster request dispatching and lower application overhead.

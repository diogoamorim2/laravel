## 2026-05-21 - [Redundant Model Refetching]
**Learning:** The codebase contained a pattern where a model was created (`Contato::create`) and then immediately re-fetched using `findOrFail($id)`. This is not only a performance waste (N+1-like redundant query) but also introduced a bug/vulnerability if the ID wasn't explicitly passed in the request.
**Action:** Always use the model instance returned by `create()` or `save()` instead of re-querying the database, especially in `store` methods.

## 2026-05-21 - [Undefined Request in Create]
**Learning:** The `ContatoController::create` method attempts to use an undefined `$request` variable, leading to 500 errors.
**Action:** When working on Controllers, ensure method signatures and variable scopes are correct.

## 2026-05-21 - [HTML Structure and LCP]
**Learning:** The `@yield('head')` directive was placed before the `<!DOCTYPE html>` declaration in the layout file, potentially causing browsers to render in quirks mode. Also, background images used in CSS are not discovered by the browser until the CSS is parsed, delaying LCP.
**Action:** Always ensure the layout structure is valid HTML (yields inside `<head>` or `<body>`). Use `<link rel="preload" as="image">` for critical background images (LCP candidates) in the head section.

## 2026-05-21 - [YouTube Iframe Performance]
**Learning:** Embedding YouTube iframes directly, even with `loading="lazy"`, can significantly impact page weight and main thread performance due to the player's JavaScript execution.
**Action:** Implement a "Facade" pattern for third-party embeds (like YouTube). Load a static thumbnail and a play button initially, and only inject the iframe when the user explicitly interacts (clicks). This defers the heavy load until it's actually needed.

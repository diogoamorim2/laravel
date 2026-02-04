## 2026-05-21 - [Redundant Model Refetching]
**Learning:** The codebase contained a pattern where a model was created (`Contato::create`) and then immediately re-fetched using `findOrFail($id)`. This is not only a performance waste (N+1-like redundant query) but also introduced a bug/vulnerability if the ID wasn't explicitly passed in the request.
**Action:** Always use the model instance returned by `create()` or `save()` instead of re-querying the database, especially in `store` methods.

## 2026-05-21 - [Undefined Request in Create]
**Learning:** The `ContatoController::create` method attempts to use an undefined `$request` variable, leading to 500 errors.
**Action:** When working on Controllers, ensure method signatures and variable scopes are correct.

## 2026-05-23 - [LCP Optimization via Preload]
**Learning:** Background images defined in CSS are discovered late by the browser. Adding `<link rel="preload" as="image">` for the first image in the slideshow significantly improves LCP perception.
**Action:** Always check `animation.css` or component styles for hidden LCP candidates and preload them explicitly in the head.

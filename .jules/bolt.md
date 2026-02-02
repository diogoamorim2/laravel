## 2026-05-21 - [Redundant Model Refetching]
**Learning:** The codebase contained a pattern where a model was created (`Contato::create`) and then immediately re-fetched using `findOrFail($id)`. This is not only a performance waste (N+1-like redundant query) but also introduced a bug/vulnerability if the ID wasn't explicitly passed in the request.
**Action:** Always use the model instance returned by `create()` or `save()` instead of re-querying the database, especially in `store` methods.

## 2026-05-21 - [Undefined Request in Create]
**Learning:** The `ContatoController::create` method attempts to use an undefined `$request` variable, leading to 500 errors.
**Action:** When working on Controllers, ensure method signatures and variable scopes are correct.

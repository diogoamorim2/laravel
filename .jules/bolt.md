## 2026-01-30 - Unconventional Resource Usage
**Learning:** `ContatoController` uses `create` (GET) to process form submissions instead of `store` (POST). This makes standard REST assumptions invalid for this specific controller.
**Action:** When working with `contatos` routes, check `create` method for processing logic, not just `store`.

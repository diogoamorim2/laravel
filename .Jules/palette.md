## 2024-05-23 - Skip to Content Link
**Learning:** This repository uses a hybrid/legacy structure where CSS is served directly from `public/css/style.css` instead of being built via Vite from `resources/css`. The site content is in Portuguese.
**Action:** When working on this repo, modify `public/css/style.css` directly and ensure accessibility labels match the Portuguese locale.

## 2024-05-23 - Visual Verification of CSS Transitions
**Learning:** When verifying UI elements that animate into view (like a skip link on focus), the verification script must include a delay (e.g., `time.sleep(1)`) to allow the CSS transition to complete before capturing the screenshot.
**Action:** Always add a small sleep buffer in Playwright scripts when testing transitions or animations.

from playwright.sync_api import sync_playwright
import os

os.makedirs("/app/verification/videos", exist_ok=True)
os.makedirs("/app/verification/screenshots", exist_ok=True)

def run_cuj(page):
    page.goto("http://127.0.0.1:8000")
    page.wait_for_timeout(1000)

    # Focus WhatsApp button
    page.evaluate("document.querySelector('.whatsapp-button').focus()")
    page.wait_for_timeout(1000)
    page.screenshot(path="/app/verification/screenshots/whatsapp_focus.png")

    page.wait_for_timeout(1000)

    # Focus Back to top button
    page.evaluate("document.querySelector('.btn-back-to-top').focus()")
    page.wait_for_timeout(1000)
    page.screenshot(path="/app/verification/screenshots/back_to_top_focus.png")

    page.wait_for_timeout(1000)


if __name__ == "__main__":
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        context = browser.new_context(
            record_video_dir="/app/verification/videos"
        )
        page = context.new_page()
        try:
            run_cuj(page)
        finally:
            context.close()
            browser.close()
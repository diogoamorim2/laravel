from playwright.sync_api import sync_playwright

def run():
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page()
        page.goto("http://127.0.0.1:8000")

        # Scroll to the subscribe section
        subscribe_section = page.locator(".subscribe")
        subscribe_section.scroll_into_view_if_needed()

        # Wait for a bit to let image load if it was lazy
        page.wait_for_timeout(2000)

        # Take a screenshot of the subscribe section
        subscribe_section.screenshot(path="verification/subscribe_section.png")

        browser.close()

if __name__ == "__main__":
    run()

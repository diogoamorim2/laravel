from playwright.sync_api import sync_playwright

def verify_scroll_ring():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()

        # Navigate to the home page
        page.goto("http://localhost:8000")

        # Wait for the button to be attached to the DOM
        button = page.locator(".btn-back-to-top")
        button.wait_for(state="attached", timeout=5000)
        print("✅ Button attached to DOM.")

        # Scroll down significantly
        print("Scrolling...")
        page.evaluate("window.scrollTo(0, 2000)")

        # Manually trigger scroll event just in case
        page.evaluate("window.dispatchEvent(new Event('scroll'))")

        # Wait for the 'show' class or visibility
        try:
            # We check for the class 'show' specifically as that's what our JS toggles
            # It might take a moment for the requestAnimationFrame to process
            page.wait_for_function("document.querySelector('.btn-back-to-top').classList.contains('show')", timeout=5000)
            print("✅ 'show' class detected on button.")
        except Exception as e:
            print(f"❌ 'show' class NOT detected: {e}")

        # Verify visibility state
        is_visible = button.is_visible()
        print(f"Button is_visible(): {is_visible}")

        # Verify the progress ring structure
        progress_ring = page.locator(".progress-ring")
        if progress_ring.count() > 0:
            print("✅ Progress ring SVG found.")
        else:
            print("❌ Progress ring SVG NOT found.")

        circle = page.locator(".progress-ring__circle")
        if circle.count() > 0:
            print("✅ Progress circle found.")
            # Check stroke-dashoffset value
            offset = circle.evaluate("el => el.style.strokeDashoffset")
            print(f"Current stroke-dashoffset: {offset}")

            if offset and float(offset) < 126:
                 print("✅ Offset updated (less than initial 126).")
            else:
                 print("❌ Offset NOT updated correctly.")
        else:
            print("❌ Progress circle NOT found.")

        # Take a screenshot
        page.screenshot(path="verification_scroll_ring.png")
        print("Screenshot saved to verification_scroll_ring.png")

        browser.close()

if __name__ == "__main__":
    verify_scroll_ring()

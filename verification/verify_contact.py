from playwright.sync_api import Page, expect, sync_playwright

def verify_contact_form(page: Page):
    # Navigate to contact page
    page.goto("http://localhost:8000/contact")

    # Hide the fade overlay so we can see the page
    page.add_style_tag(content=".fade { display: none !important; }")

    # Fill form
    page.fill('input[name="nome"]', 'Test User')
    page.fill('input[name="email"]', 'test@example.com')
    page.fill('input[name="assunto"]', 'Test Subject')
    page.fill('textarea[name="comentario"]', 'This is a test message.')

    # Submit
    page.click('button:has-text("Enviar menssagem")')

    # Wait for reload/navigation (implicit in click usually if it's a form, but safer to wait)
    # Actually, Playwright auto-waits for load state if click causes navigation.
    # But we need to re-apply the style.

    page.wait_for_load_state('networkidle')
    page.add_style_tag(content=".fade { display: none !important; }")

    # Assert Success Message
    expect(page.locator('.alert-success')).to_be_visible()

    # Screenshot
    page.screenshot(path="verification/contact_success.png")

if __name__ == "__main__":
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()
        try:
            verify_contact_form(page)
        finally:
            browser.close()

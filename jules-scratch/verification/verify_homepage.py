from playwright.sync_api import sync_playwright, Page, expect

def verify_homepage(page: Page):
    # Navigate to the local HTML file
    # The path is absolute within the container
    page.goto("file:///app/resources/views/homepage.blade.php")

    # Wait for the main heading to be visible to ensure the page has loaded
    expect(page.get_by_role("heading", name="ยินดีต้อนรับ")).to_be_visible(timeout=5000)

    # Take a screenshot for visual verification
    page.screenshot(path="jules-scratch/verification/homepage.png")

# --- Boilerplate to run the verification ---
def main():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()
        verify_homepage(page)
        browser.close()

if __name__ == "__main__":
    main()

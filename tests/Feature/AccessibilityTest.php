<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccessibilityTest extends TestCase
{
    /**
     * Test that the skip to content link exists and points to the correct ID on the homepage.
     */
    public function test_skip_link_exists_on_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('class="skip-link"', false);
        $response->assertSee('href="#main-content"', false);
        $response->assertSee('id="main-content"', false);
    }

    /**
     * Test that the skip to content link exists on other pages.
     */
    public function test_skip_link_exists_on_other_pages()
    {
        $pages = ['/about', '/contact', '/service'];

        foreach ($pages as $page) {
            $response = $this->get($page);

            $response->assertStatus(200);
            $response->assertSee('class="skip-link"', false);
            $response->assertSee('href="#main-content"', false);
            $response->assertSee('id="main-content"', false);
        }
    }

    /**
     * Test that the skip link exists on industries page (which doesn't use the main layout).
     */
    public function test_skip_link_exists_on_industries_page()
    {
        $response = $this->get('/industries');

        $response->assertStatus(200);
        $response->assertSee('class="skip-link"', false);
        $response->assertSee('href="#main-content"', false);
        $response->assertSee('id="main-content"', false);
    }
}

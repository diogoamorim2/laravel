<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /**
     * Test that the home page loads successfully.
     */
    public function test_home_page_loads(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('index');
    }

    /**
     * Test that the /index route loads successfully.
     */
    public function test_index_route_loads(): void
    {
        $response = $this->get('/index');
        $response->assertStatus(200);
        $response->assertViewIs('index');
    }

    /**
     * Test that the about page loads successfully.
     */
    public function test_about_page_loads(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertViewIs('about');
    }

    /**
     * Test that the service page loads successfully.
     */
    public function test_service_page_loads(): void
    {
        $response = $this->get('/service');
        $response->assertStatus(200);
        $response->assertViewIs('service');
    }

    /**
     * Test that the industries page loads successfully.
     */
    public function test_industries_page_loads(): void
    {
        $response = $this->get('/industries');
        $response->assertStatus(200);
        $response->assertViewIs('industries');
    }

    /**
     * Test that the contact page loads successfully.
     */
    public function test_contact_page_loads(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertViewIs('contact');
    }

    /**
     * Test that the login route redirects to home.
     */
    public function test_login_route_redirects_to_home(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    /**
     * Test that the layout includes preload tags for critical fonts.
     */
    public function test_layout_has_preload_tags(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Assert critical fonts are preloaded
        $response->assertSee('rel="preload" href="http://localhost/font/Damion.ttf"', false);
        $response->assertSee('rel="preload" href="http://localhost/font/Nunito-Regular.ttf"', false);

        // Assert bootstrap icons font is preloaded with correct query string
        $response->assertSee('rel="preload" href="http://localhost/icons/fonts/bootstrap-icons.woff2?1fa40e8900654d2863d011707b9fb6f2"', false);
    }

    /**
     * Test that the industries page includes preload tags for critical fonts.
     */
    public function test_industries_page_has_preload_tags(): void
    {
        $response = $this->get('/industries');
        $response->assertStatus(200);

        // Assert critical fonts are preloaded
        $response->assertSee('rel="preload" href="http://localhost/font/Damion.ttf"', false);
        $response->assertSee('rel="preload" href="http://localhost/font/Nunito-Regular.ttf"', false);

        // Assert bootstrap icons font is preloaded with correct query string
        $response->assertSee('rel="preload" href="http://localhost/icons/fonts/bootstrap-icons.woff2?1fa40e8900654d2863d011707b9fb6f2"', false);
    }
}

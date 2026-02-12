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
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class YouTubeFacadeTest extends TestCase
{
    /**
     * Test that the home page loads with YouTube facades instead of direct iframes.
     */
    public function test_it_loads_home_page_with_youtube_facade(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Assert that the direct iframe embed is NOT present
        // (Note: The facade script might generate an iframe later, but the initial HTML should not have it)
        $response->assertDontSee('src="https://www.youtube.com/embed/3PWgUvvxjkI"', false);
        $response->assertDontSee('src="https://www.youtube.com/embed/-urSrobDaVE"', false);

        // Assert that the facade is present
        $response->assertSee('class="youtube-facade"', false);
        $response->assertSee('data-video-id="3PWgUvvxjkI"', false);
        $response->assertSee('data-video-id="-urSrobDaVE"', false);
    }
}

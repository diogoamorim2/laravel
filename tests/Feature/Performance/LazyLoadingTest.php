<?php

namespace Tests\Feature\Performance;

use Tests\TestCase;

class LazyLoadingTest extends TestCase
{
    /**
     * Verify that the subscribe background image is lazy loaded and not inline.
     *
     * @return void
     */
    public function test_subscribe_background_image_is_lazy_loaded()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Assert that the inline style with background image is NOT present
        $response->assertDontSee("style=\"background-image: url('art/overlay.webp');\"", false);

        // Assert that the image tag is present with loading="lazy"
        // Use a regex or check for presence of attributes close to the image source
        // Since asset() returns a full URL, we check for the filename part
        $response->assertSee('art/overlay.webp');
        $response->assertSee('loading="lazy"', false);
        $response->assertSee('class="subscribe-bg"', false);
    }
}

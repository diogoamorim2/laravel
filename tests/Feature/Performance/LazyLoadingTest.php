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

        // Verify that the background image is applied via CSS class instead of inline style or lazy-loaded image tag
        $response->assertSee('class="subscribe bg-primary-foot"', false);
        $response->assertSee('class="subscribe-bg" loading="lazy"', false);
    }
}

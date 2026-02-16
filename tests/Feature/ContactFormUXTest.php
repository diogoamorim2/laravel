<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormUXTest extends TestCase
{
    /**
     * Test that the character counter is present and attributes are set correctly.
     */
    public function test_character_counter_elements_are_present(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        // Check for the character counter element
        $response->assertSee('<small id="char-count-comentario" class="fc-primary ml-a">0/2000</small>', false);

        // Check for the aria-describedby attribute
        $response->assertSee('aria-describedby="error-comentario char-count-comentario"', false);
    }
}

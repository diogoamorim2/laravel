<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_validation_error_ux()
    {
        // Visit the homepage
        $response = $this->get('/');
        $response->assertStatus(200);

        // Submit the newsletter form with invalid email
        $response = $this->post(route('contatos.store'), [
            'newslatter' => '1',
            'email' => 'invalid-email',
        ]);

        // It should redirect back with errors
        $response->assertSessionHasErrors('email');

        // Follow the redirect
        $response = $this->get('/');

        // Assert that the error message is displayed by checking for the container class
        $response->assertSee('text-danger');

        // Assert the FIX: The input has 'is-invalid' class instead of 'is-valid'
        // The input has id="subscribe-email"
        // After the fix, 'is-invalid' IS present because the input has an error.
        // And 'is-valid' IS NOT present.

        // We use assertSee with escaping disabled to match HTML attributes
        $response->assertSee('id="subscribe-email"', false);
        $response->assertSee('is-invalid', false);
        $response->assertDontSee('is-valid', false);
    }
}

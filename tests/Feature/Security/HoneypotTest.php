<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HoneypotTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function submission_with_filled_honeypot_is_rejected()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Spam Bot',
            'email' => 'spam@example.com',
            'fax' => 'This should be empty', // Honeypot filled
            'newslatter' => '1',
        ]);

        // Should return validation error for 'fax'
        $response->assertSessionHasErrors(['fax']);
    }

    /** @test */
    public function submission_with_empty_honeypot_is_accepted()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Legit User',
            'email' => 'legit@example.com',
            'fax' => '', // Empty as expected
            'newslatter' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}

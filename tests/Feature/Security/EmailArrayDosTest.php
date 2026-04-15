<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_email_gracefully()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Attacker',
            'email' => ['attacker@example.com'], // Array payload instead of string
            'assunto' => 'Spam',
            'comentario' => 'Spam content',
        ]);

        // It should be rejected by FormRequest validation with a 302 redirect
        // and shouldn't reach the Str::lower() in controller causing a 500 TypeError
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }
}

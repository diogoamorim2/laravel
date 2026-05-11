<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_rejects_array_payload_for_email_field()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Test User',
            'email' => ['array_payload_dos'],
            'assunto' => 'Test Subject',
        ]);

        $response->assertSessionHasErrors(['email']);
        $response->assertStatus(302);
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

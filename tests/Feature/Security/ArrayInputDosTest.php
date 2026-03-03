<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArrayInputDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_rejects_array_payload_in_text_field()
    {
        $payload = [
            'nome' => ['An array instead of string'],
            'email' => 'test@example.com',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('nome');
    }
}

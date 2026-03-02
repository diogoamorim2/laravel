<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InputArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_does_not_crash_when_input_is_array()
    {
        $payload = [
            'nome' => ['John Doe'], // Invalid array input instead of string
            'email' => 'john@example.com',
            'assunto' => 'Hello',
        ];

        // Using json to simulate API-like input passing nested arrays
        $response = $this->postJson(route('contatos.store'), $payload);

        // Should return a validation error (422) instead of crashing (500)
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nome']);
    }

    public function test_update_does_not_crash_when_input_is_array()
    {
        $user = User::factory()->create();
        $contato = Contato::create([
            'nome' => 'Original',
            'email' => 'original@example.com',
        ]);

        $payload = [
            'nome' => ['Updated Name'], // Invalid array input instead of string
            'email' => 'updated@example.com',
            'assunto' => 'Updated Subject',
        ];

        $response = $this->actingAs($user)
            ->putJson(route('contatos.update', $contato), $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nome']);
    }
}

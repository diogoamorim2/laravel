<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InputSanitizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_sanitizes_input_fields_on_store()
    {
        $payload = [
            'nome' => 'John <b>Doe</b>',
            'email' => 'john@example.com',
            'assunto' => 'Hello <script>alert(1)</script>',
            'comentario' => 'Message with <i>style</i> and <a href="http://evil.com">link</a>.',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contatos', [
            'email' => 'john@example.com',
            'nome' => 'John Doe',
            'assunto' => 'Hello alert(1)',
            'comentario' => 'Message with style and link.',
        ]);
    }

    public function test_it_sanitizes_input_fields_on_update()
    {
        $user = \App\Models\User::factory()->create();
        $contato = \App\Models\Contato::create([
            'nome' => 'Original',
            'email' => 'original@example.com',
        ]);

        $payload = [
            'nome' => 'Updated <b>Name</b>',
            'email' => 'updated@example.com',
            'assunto' => 'Updated <script>alert(1)</script>',
            'comentario' => 'Updated <i>comment</i>.',
        ];

        $response = $this->actingAs($user)
            ->put(route('contatos.update', $contato), $payload);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contatos', [
            'id' => $contato->id,
            'email' => 'updated@example.com',
            'nome' => 'Updated Name',
            'assunto' => 'Updated alert(1)',
            'comentario' => 'Updated comment.',
        ]);
    }
}

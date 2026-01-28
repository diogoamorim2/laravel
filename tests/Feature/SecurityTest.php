<?php

namespace Tests\Feature;

use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_create_does_not_create_contact()
    {
        $response = $this->get('/contatos/create?email=hacker@example.com');

        $response->assertStatus(200);
        $response->assertViewIs('contact');

        $this->assertDatabaseMissing('contatos', ['email' => 'hacker@example.com']);
    }

    public function test_post_store_creates_contact()
    {
        $data = [
            'email' => 'legit@example.com',
            'assunto' => 'Hello',
            'comentario' => 'World',
            'nome' => 'Tester',
        ];

        $response = $this->post(route('contatos.store'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contatos', ['email' => 'legit@example.com']);
    }

    public function test_index_does_not_leak_data_to_guest()
    {
        Contato::create(['email' => 'secret@example.com']);

        $response = $this->get('/contatos');

        $response->assertStatus(200);
        $response->assertViewIs('index');

        // Assert that the 'contatos' variable is NOT present in the view data
        $response->assertViewMissing('contatos');
    }
}

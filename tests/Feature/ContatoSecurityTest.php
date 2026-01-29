<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contato;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ContatoSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_create_route_does_not_create_contact()
    {
        Mail::fake();

        $response = $this->get('/contatos/create?nome=Hacker&email=hacker@test.com&assunto=Test&comentario=Attack&newslatter=1');

        $this->assertDatabaseMissing('contatos', [
            'email' => 'hacker@test.com',
        ]);

        // It should redirect to contact page
        $response->assertRedirect('/contact');
    }

    public function test_post_store_route_creates_contact()
    {
        Mail::fake();

        $response = $this->post('/contatos', [
            'nome' => 'Good User',
            'email' => 'user@test.com',
            'assunto' => 'Hello',
            'comentario' => 'World',
            'newslatter' => '1',
        ]);

        $this->assertDatabaseHas('contatos', [
            'email' => 'user@test.com',
        ]);

        // Assert redirected
        $response->assertRedirect();
    }

    public function test_index_route_requires_auth()
    {
        $response = $this->get('/contatos');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contatos');

        $response->assertStatus(200);
        $response->assertViewIs('contato.index');
    }
}

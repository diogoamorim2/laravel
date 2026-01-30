<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contato;

class ContactFormSecurityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_prevents_creation_via_get_request()
    {
        $data = [
            'nome' => 'Hacker',
            'email' => 'hacker@example.com',
            'assunto' => 'CSRF Attack',
            'comentario' => 'This was created via GET',
        ];

        // Sending data as query parameters
        // We append query params manually to simulate the attack
        $url = route('contatos.create') . '?' . http_build_query($data);

        $response = $this->get($url);

        // It should redirect to /contact (as per our refactor)
        $response->assertStatus(302);
        $response->assertRedirect('/contact');

        // Assert that the contact was NOT created in the database
        $this->assertDatabaseMissing('contatos', [
            'email' => 'hacker@example.com',
            'assunto' => 'CSRF Attack',
        ]);
    }

    /** @test */
    public function it_allows_creation_via_post_request()
    {
        $data = [
            'nome' => 'Legit User',
            'email' => 'legit@example.com',
            'assunto' => 'Legit Message',
            'comentario' => 'This was created via POST',
            'newslatter' => '1',
        ];

        $response = $this->post(route('contatos.store'), $data);

        // It redirects back (which in a test environment without referer might be default or root)
        $response->assertStatus(302);

        $this->assertDatabaseHas('contatos', [
            'email' => 'legit@example.com',
            'assunto' => 'Legit Message',
        ]);
    }
}

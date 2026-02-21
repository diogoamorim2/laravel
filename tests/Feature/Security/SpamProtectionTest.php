<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpamProtectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_rejects_names_with_urls()
    {
        $payload = [
            'nome' => 'John http://spam.com Doe',
            'email' => 'john@example.com',
            'assunto' => 'Hello',
            'comentario' => 'Just saying hi.',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertSessionHasErrors(['nome']);
    }

    /** @test */
    public function it_rejects_names_with_https_urls()
    {
        $payload = [
            'nome' => 'Jane https://malicious.site Smith',
            'email' => 'jane@example.com',
            'assunto' => 'Hello',
            'comentario' => 'Check this out.',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertSessionHasErrors(['nome']);
    }

    /** @test */
    public function it_rejects_names_with_www_urls()
    {
        $payload = [
            'nome' => 'Bot www.bot.net',
            'email' => 'bot@example.com',
            'assunto' => 'Hello',
            'comentario' => 'Bot message.',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertSessionHasErrors(['nome']);
    }

    /** @test */
    public function it_accepts_valid_names()
    {
        $payload = [
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'assunto' => 'Hello',
            'comentario' => 'Legitimate message.',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}

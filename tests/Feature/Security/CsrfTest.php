<?php

namespace Tests\Feature\Security;

use App\Mail\FaleConoscoContato;
use App\Mail\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CsrfTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_request_to_create_endpoint_no_longer_creates_contact()
    {
        Mail::fake();

        $data = [
            'email' => 'hacker@example.com',
            'nome' => 'Hacker',
            'assunto' => 'CSRF Attack',
            'comentario' => 'This was created via GET',
            'newslatter' => '1',
        ];

        // GET request with data
        $url = route('contatos.create', $data);
        $response = $this->get($url);

        // Assert it returns the view (status 200)
        $response->assertStatus(200);
        $response->assertViewIs('contact');

        // Assert NO data is in DB
        $this->assertDatabaseMissing('contatos', [
            'email' => 'hacker@example.com',
        ]);

        // Assert no emails queued
        Mail::assertNothingQueued();
    }

    /** @test */
    public function post_request_to_store_creates_contact_and_sends_emails()
    {
        Mail::fake();

        $data = [
            'email' => 'valid@example.com',
            'nome' => 'Valid User',
            'assunto' => 'Legit Message',
            'comentario' => 'This is a POST request',
            'newslatter' => '1',
            'telefone_fixo' => '11999998888', // Valid string now
        ];

        // POST request
        $response = $this->post(route('contatos.store'), $data);

        // Assert redirect back
        $response->assertStatus(302);
        $response->assertSessionHas('success');

        // Assert data is in DB
        $this->assertDatabaseHas('contatos', [
            'email' => 'valid@example.com',
            'nome' => 'Valid User',
            'telefone_fixo' => '11999998888',
        ]);

        // Assert emails queued
        Mail::assertQueued(Newsletter::class);
        Mail::assertQueued(FaleConoscoContato::class);
    }

    /** @test */
    public function newsletter_subscription_only_sends_newsletter_email()
    {
        Mail::fake();

        $data = [
            'email' => 'subscriber@example.com',
            'newslatter' => '1',
            // No subject or comment
        ];

        $response = $this->post(route('contatos.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contatos', [
            'email' => 'subscriber@example.com',
        ]);

        Mail::assertQueued(Newsletter::class);
        Mail::assertNotQueued(FaleConoscoContato::class);
    }
}

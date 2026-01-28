<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Mail\Newsletter;
use App\Mail\FaleConoscoContato;
use App\Models\Contato;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_queues_emails()
    {
        Mail::fake();

        $data = [
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'assunto' => 'Test Subject',
            'comentario' => 'This is a test message',
        ];

        // The form action in view is route('contatos.create') with method GET
        // and it redirects to /contact
        $response = $this->get(route('contatos.create', $data));

        $response->assertRedirect('/contact');

        // Assert that the contact was created
        $this->assertDatabaseHas('contatos', [
            'email' => 'john@example.com',
        ]);

        // Assert emails are queued
        Mail::assertQueued(Newsletter::class);
        Mail::assertQueued(FaleConoscoContato::class);
    }
}

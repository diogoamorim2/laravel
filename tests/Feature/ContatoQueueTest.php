<?php

namespace Tests\Feature;

use App\Mail\FaleConoscoContato;
use App\Mail\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContatoQueueTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that emails are queued when a contact is created.
     */
    public function test_emails_are_queued_on_contact_creation(): void
    {
        Mail::fake();

        $response = $this->get(route('contatos.create', [
            'nome' => 'Test User',
            'email' => 'test@example.com',
            'assunto' => 'Test Subject',
            'comentario' => 'Test Comment',
            'newslatter' => '1',
        ]));

        $response->assertStatus(302); // Redirects back

        // Assert that the contact was created
        $this->assertDatabaseHas('contatos', [
            'email' => 'test@example.com',
        ]);

        // Assert that emails were queued
        // Note: Before the fix, these assertions will fail because they are sent immediately (sync),
        // unless Mail::fake() captures sync sends as "sent" but NOT "queued".
        // Mail::assertQueued checks if it was pushed to the queue.
        Mail::assertQueued(Newsletter::class);
        Mail::assertQueued(FaleConoscoContato::class);
    }
}

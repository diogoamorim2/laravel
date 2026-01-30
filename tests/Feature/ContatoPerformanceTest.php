<?php

namespace Tests\Feature;

use App\Mail\FaleConoscoContato;
use App\Mail\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContatoPerformanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that emails are queued when creating a contact.
     */
    public function test_emails_are_queued_on_contact_creation(): void
    {
        Mail::fake();

        $data = [
            'nome' => 'Test User',
            'email' => 'test@example.com',
            'assunto' => 'Test Subject',
            'comentario' => 'Test Comment',
            'newslatter' => '1',
            // Skipping phone numbers to avoid validation issues with max:15
        ];

        $response = $this->get(route('contatos.create', $data));

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');

        // Assert that the emails were queued
        Mail::assertQueued(Newsletter::class);
        Mail::assertQueued(FaleConoscoContato::class);
    }
}

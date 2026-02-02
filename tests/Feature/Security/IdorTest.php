<?php

namespace Tests\Feature\Security;

use App\Mail\Newsletter;
use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class IdorTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_endpoint_uses_created_model_instead_of_input_id()
    {
        Mail::fake();

        // Create a "victim" contact with ID 1
        $victim = Contato::create([
            'nome' => 'Victim',
            'email' => 'victim@example.com',
            'assunto' => 'Victim Subject',
            'comentario' => 'Victim Comment',
        ]);

        // Attempt to create a NEW contact, but inject 'id' => $victim->id
        $response = $this->post(route('contatos.store'), [
            'id' => $victim->id, // Malicious input
            'nome' => 'Attacker',
            'email' => 'attacker@example.com',
            'assunto' => 'Attacker Subject',
            'comentario' => 'Attacker Comment',
        ]);

        $response->assertRedirect();

        // Assert that the email was sent to the ATTACKER (the newly created contact),
        // NOT the VICTIM.

        Mail::assertQueued(Newsletter::class, function ($mail) {
            return $mail->hasTo('attacker@example.com');
        });

        Mail::assertNotQueued(Newsletter::class, function ($mail) {
            return $mail->hasTo('victim@example.com');
        });
    }

    public function test_store_endpoint_rejects_invalid_email()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Invalid Email User',
            'email' => 'not-an-email',
            'assunto' => 'Test',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
}

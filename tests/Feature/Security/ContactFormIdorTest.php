<?php

namespace Tests\Feature\Security;

use App\Mail\Newsletter;
use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormIdorTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_idor_vulnerability()
    {
        // 1. Seed a "victim" contact
        $victim = Contato::create([
            'nome' => 'Victim User',
            'email' => 'victim@example.com',
            'assunto' => 'Existing Contact',
            'comentario' => 'Do not touch me',
            'telefone_celular' => '1234567890',
        ]);

        // 2. Mock Mail to intercept and verify
        Mail::fake();

        // 3. Attacker submits form with their own data but ID of victim
        // The id parameter in POST request should be ignored in a secure app,
        // but due to the bug, it is used to load the contact.
        $response = $this->post('/contatos', [
            'nome' => 'Attacker',
            'email' => 'attacker@example.com',
            'assunto' => 'Spam',
            'comentario' => 'Spam content',
            'telefone_celular' => '0987654321',
            'id' => $victim->id, // Malicious payload
        ]);

        $response->assertStatus(302); // Redirects after "success"

        // 4. Assert that the email was sent to the ATTACKER (correct behavior)
        // And NOT to the victim.
        Mail::assertQueued(Newsletter::class, function ($mail) {
            return $mail->hasTo('attacker@example.com');
        });

        Mail::assertNotQueued(Newsletter::class, function ($mail) use ($victim) {
            return $mail->hasTo($victim->email);
        });
    }
}

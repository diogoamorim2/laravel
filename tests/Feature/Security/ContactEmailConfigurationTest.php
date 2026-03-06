<?php

namespace Tests\Feature\Security;

use App\Mail\FaleConoscoContato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactEmailConfigurationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function contact_form_sends_email_to_configured_address()
    {
        // Mock the configuration
        $mockEmail = 'admin-test@example.com';
        Config::set('services.contact.email', $mockEmail);

        Mail::fake();

        // Submit the form
        $response = $this->post(route('contatos.store'), [
            'nome' => 'John Doe',
            'email' => 'john@example.com',
            'assunto' => 'Test Subject', // Ensures admin email is triggered
            'comentario' => 'Test Message',
            'newslatter' => '1',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Assert email was queued to the mocked address
        Mail::assertQueued(FaleConoscoContato::class, function ($mail) use ($mockEmail) {
            return $mail->hasTo($mockEmail);
        });
    }
}

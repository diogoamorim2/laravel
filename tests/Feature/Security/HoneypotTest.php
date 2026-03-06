<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class HoneypotTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function submission_with_filled_honeypot_is_rejected()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Spam Bot',
            'email' => 'spam@example.com',
            'fax' => 'This should be empty', // Honeypot filled
            'newslatter' => '1',
        ]);

        // Should return validation error for 'fax'
        $response->assertSessionHasErrors(['fax']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function submission_with_empty_honeypot_is_accepted()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Legit User',
            'email' => 'legit@example.com',
            'fax' => '', // Empty as expected
            'newslatter' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function submission_with_filled_honeypot_triggers_log()
    {
        Log::shouldReceive('warning')
            ->once()
            ->withArgs(function ($message, $context) {
                return $message === 'Honeypot triggered' &&
                       isset($context['ip']) &&
                       $context['fax_content'] === 'Spam content';
            });

        $this->post(route('contatos.store'), [
            'nome' => 'Bot',
            'email' => 'bot@example.com',
            'fax' => 'Spam content',
            'newslatter' => '1',
        ]);
    }
}

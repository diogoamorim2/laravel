<?php

namespace Tests\Feature\Security;

use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class EmailRateLimitTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\Test]
    public function it_limits_submissions_to_the_same_email_from_different_ips()
    {
        $email = 'victim@example.com';

        // Ensure rate limiter is clear (key matches implementation)
        RateLimiter::clear('contact_email_limit:' . $email);

        // 1st attempt - IP 1
        $this->withServerVariables(['REMOTE_ADDR' => '1.2.3.4'])
             ->post('/contatos', [
                 'nome' => 'Attacker 1',
                 'email' => $email,
                 'assunto' => 'Spam 1',
                 'comentario' => 'Spam content',
             ])->assertSessionHasNoErrors();

        // 2nd attempt - IP 2
        $this->withServerVariables(['REMOTE_ADDR' => '1.2.3.5'])
             ->post('/contatos', [
                 'nome' => 'Attacker 2',
                 'email' => $email,
                 'assunto' => 'Spam 2',
                 'comentario' => 'Spam content',
             ])->assertSessionHasNoErrors();

        // 3rd attempt - IP 3
        $this->withServerVariables(['REMOTE_ADDR' => '1.2.3.6'])
             ->post('/contatos', [
                 'nome' => 'Attacker 3',
                 'email' => $email,
                 'assunto' => 'Spam 3',
                 'comentario' => 'Spam content',
             ])->assertSessionHasNoErrors();

        // 4th attempt - IP 4 (should be blocked if limit is 3)
        $response = $this->withServerVariables(['REMOTE_ADDR' => '1.2.3.7'])
             ->post('/contatos', [
                 'nome' => 'Attacker 4',
                 'email' => $email,
                 'assunto' => 'Spam 4',
                 'comentario' => 'Spam content',
             ]);

        // Expect redirect with specific error
        $response->assertSessionHas('error', 'Muitas tentativas para este email. Tente novamente mais tarde.');
    }
}

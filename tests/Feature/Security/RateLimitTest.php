<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RateLimitTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_submission_rate_limiting(): void
    {
        // 1st request
        $response = $this->post('/contatos', []);
        $response->assertStatus(302); // Validation error

        // 2nd request
        $response = $this->post('/contatos', []);
        $response->assertStatus(302);

        // 3rd request
        $response = $this->post('/contatos', []);
        $response->assertStatus(302);

        // 4th request - Should fail due to throttle
        $response = $this->post('/contatos', []);
        $response->assertStatus(429);
    }
}

<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_email_rate_limiter()
    {
        $response = $this->post(route('contatos.store'), [
            'email' => ['array_payload_dos'],
        ]);

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

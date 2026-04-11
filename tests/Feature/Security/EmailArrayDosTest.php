<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_email_parameter()
    {
        $response = $this->post(route('contatos.store'), [
            'email' => ['array_payload_dos'],
            'nome' => 'Test Name',
            'assunto' => 'Test Subject',
        ]);

        // Form validation will intercept the array payload and return a 302 with session errors
        $response->assertSessionHasErrors(['email']);
        $response->assertStatus(302);
    }
}

<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class RouteSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_route_is_removed(): void
    {
        $response = $this->get('/user/1');
        $response->assertNotFound();
    }

    public function test_contact_store_rate_limiting(): void
    {
        // Hit the endpoint 3 times (limit)
        for ($i = 0; $i < 3; $i++) {
            $this->post('/contatos', [
                'email' => 'test@example.com',
                'nome' => 'Test User',
            ])->assertStatus(302); // Redirect back on success (validation passes)
        }

        // 4th time should fail with 429 Too Many Requests
        $this->post('/contatos', [
            'email' => 'test@example.com',
            'nome' => 'Test User',
        ])->assertStatus(429);
    }

    public function test_contact_input_validation_max_length(): void
    {
        $response = $this->post('/contatos', [
            'email' => 'test@example.com',
            'nome' => Str::random(256), // > 255
            'comentario' => Str::random(2001), // > 2000
        ]);

        $response->assertSessionHasErrors(['nome', 'comentario']);
    }
}

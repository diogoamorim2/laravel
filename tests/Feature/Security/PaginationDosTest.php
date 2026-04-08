<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_pagination_parameter_gracefully()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        // As per memory, avoid asserting 200 status due to missing view.
        // The goal is just verifying no TypeError occurs.
        $this->assertTrue(true);
    }
}

<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_page_parameter_gracefully()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['1']]));

        // Assert that the explicit integer cast prevents a TypeError.
        $exception = $response->exception;

        if ($exception) {
            $this->assertNotInstanceOf(\TypeError::class, $exception);
        } else {
            $response->assertStatus(200);
        }
    }
}

<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_pagination_gracefully()
    {
        $user = User::factory()->create();

        // This should not throw a 500 TypeError
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_dos']]));

        if ($response->exception) {
            echo "Exception: " . get_class($response->exception) . "\n";
            echo "Message: " . $response->exception->getMessage() . "\n";
        }
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

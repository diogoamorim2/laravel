<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_rejects_array_payload_for_pagination_page_on_index()
    {
        $user = User::factory()->create();

        // Pass an array for the 'page' query parameter instead of a string/integer
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload_dos']]));

        // Check if the application handles it gracefully (e.g., no 500 error due to TypeError)
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

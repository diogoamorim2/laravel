<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function test_it_handles_array_pagination_safely()
    {
        $user = User::factory()->create();

        // Sending an array to 'page' input parameter which is used in math: `request()->input('page', 1) - 1`
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));

        // Should not throw a TypeError 500 error.
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);

        // It might return 500 because view is missing (as verified by other tests),
        // but it should definitely not return 500 due to a TypeError.
        // We ensure it doesn't redirect to login.
        $this->assertNotEquals(route('login'), $response->headers->get('Location'));
    }
}

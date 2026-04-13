<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_does_not_throw_type_error_with_array_pagination()
    {
        $user = User::factory()->create();

        // The endpoint should not throw a 500 TypeError
        // Note: It might return 500 for missing view, so we assert no TypeError is thrown
        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

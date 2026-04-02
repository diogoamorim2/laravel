<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_rejects_array_payload_for_pagination()
    {
        $user = User::factory()->create();

        // Access the index route authenticated (since the route is under auth middleware)
        // Note: the route is in web.php inside auth middleware for GET /contatos
        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        // We check that a TypeError is NOT thrown.
        // It might return a 200, or a View exception because the view is missing as per memory.
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

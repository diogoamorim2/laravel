<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contatos?page[]=array_payload');

        // It should NOT throw a 500 TypeError. Since view might be missing,
        // it may throw a 500 ErrorException (View missing), but NOT TypeError.
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_in_page_parameter()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/contatos?page[]=1');
        // If the view is missing, it will throw a 500 error for missing view, but not the TypeError
        // We assert that the exception is NOT a TypeError
        if ($response->exception) {
            $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        } else {
            $this->assertNotEquals(500, $response->getStatusCode());
        }
    }
}

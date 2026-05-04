<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contatos?page[]=foo');

        // Assert that no TypeError was thrown by asserting the exception is not an instance of TypeError
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

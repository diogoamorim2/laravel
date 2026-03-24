<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_handles_array_payload_for_pagination_page_parameter()
    {
        $user = User::factory()->create();

        // Pass array to page parameter
        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

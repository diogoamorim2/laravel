<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

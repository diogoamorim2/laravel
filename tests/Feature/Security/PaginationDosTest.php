<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_rejects_array_payload_for_pagination()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

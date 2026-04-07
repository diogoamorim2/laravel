<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_pagination_array_dos()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

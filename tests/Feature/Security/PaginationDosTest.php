<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_pagination_array_dos()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

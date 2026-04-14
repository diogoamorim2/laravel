<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_pagination_array_dos()
    {
        $user = User::factory()->create();

        // Pass an array instead of a string to trigger the TypeError in ContatoController@index
        // ->with('i', (request()->input('page', 1) - 1) * 5);
        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

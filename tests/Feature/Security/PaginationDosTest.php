<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_in_page_parameter_without_500_error()
    {
        $user = User::factory()->create();

        // Sending an array as the "page" parameter
        // E.g., /contatos?page[]=1
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['1']]));

        // As long as it is not a TypeError, we consider it fixed
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

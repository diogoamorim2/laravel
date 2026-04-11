<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload_dos']]));

        // Ensure no TypeError is thrown (which would cause a 500 error) due to math operations on an array
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

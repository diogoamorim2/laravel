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

        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['1']]));

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

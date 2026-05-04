<?php

namespace Tests\Feature\Security;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_page_payload()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['foo']]));

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

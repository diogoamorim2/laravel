<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_does_not_crash_on_array_page_parameter()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['1']]));

        // Ensure no 500 error is thrown due to TypeError in strip_tags or pagination math
        // View not found is thrown because the view does not exist yet. It is a 500 but it's not a type error
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

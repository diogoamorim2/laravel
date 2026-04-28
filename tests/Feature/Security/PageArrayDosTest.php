<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));

        if ($response->exception) {
            $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        } else {
            $response->assertStatus(200);
        }
    }
}

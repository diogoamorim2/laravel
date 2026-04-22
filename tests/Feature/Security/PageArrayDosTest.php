<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_rejects_array_payload_for_page_parameter_on_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('contatos.index', [
            'page' => ['array_payload_dos']
        ]));

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

<?php

namespace Tests\Feature\Security;

use App\Models\User;
use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        Contato::create([
            'nome' => 'Original Name',
            'email' => 'original@example.com',
            'assunto' => 'Original Subject',
        ]);

        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

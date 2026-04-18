<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArrayInputDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_rejects_array_payload_for_string_fields_on_store()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => ['array_payload_dos'],
            'email' => 'test@example.com',
            'assunto' => 'Test Subject',
        ]);

        $response->assertSessionHasErrors(['nome']);
        // Ensure no 500 error is thrown due to TypeError in strip_tags
        $response->assertStatus(302);
    }

    public function test_it_rejects_array_payload_for_string_fields_on_update()
    {
        $user = User::factory()->create();
        $contato = Contato::create([
            'nome' => 'Original Name',
            'email' => 'original@example.com',
            'assunto' => 'Original Subject',
        ]);

        $response = $this->actingAs($user)->put(route('contatos.update', $contato), [
            'nome' => ['array_payload_dos'],
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors(['nome']);
        // Ensure no 500 error is thrown due to TypeError in strip_tags
        $response->assertStatus(302);
    }

    public function test_it_handles_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));
        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

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

    public function test_it_handles_array_payload_for_page_parameter_on_index()
    {
        $user = User::factory()->create();

        // Pass an array to the page parameter which previously caused a 500 TypeError
        $response = $this->actingAs($user)->get(route('contatos.index', ['page' => ['array_payload']]));

        // If the view exists, it will return 200. Otherwise, it throws InvalidArgumentException which returns 500 in testing.
        // What we care about is that it doesn't throw a TypeError.
        // We catch the response exception and assert it's not a TypeError.
        if ($response->exception) {
            $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        } else {
            $response->assertStatus(200);
        }
    }
}

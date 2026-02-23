<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MassAssignmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ativo_field_cannot_be_set_via_public_form()
    {
        // Attempt to create a contact with 'ativo' set to false (0)
        // By default, 'ativo' is true (1) in database schema.
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Test User',
            'email' => 'test@example.com',
            'assunto' => 'Test Subject',
            'comentario' => 'Test Comment',
            'ativo' => '0', // Attempt to set as inactive
            'newslatter' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        // Retrieve the created contact
        $contact = Contato::where('email', 'test@example.com')->first();

        // Assert that 'ativo' is 1 (true), ignoring the input '0'
        $this->assertEquals(1, $contact->ativo, 'The "ativo" field should be ignored and default to 1.');
    }
}

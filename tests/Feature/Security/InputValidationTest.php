<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InputValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_contact_validation_rejects_invalid_inputs()
    {
        // Current implementation: Allows random strings in phone (max 20) and newsletter.
        // We want to enhance security by rejecting them.

        // Test Invalid Phone Number (contains letters)
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Attacker',
            'email' => 'attacker@example.com',
            'assunto' => 'Spam',
            'comentario' => 'Spam content',
            'telefone_celular' => 'abcde12345', // Contains letters
            'telefone_fixo' => '12345-abcd', // Contains letters
            'newslatter' => 'malicious_string', // Not a boolean
        ]);

        // Expect validation errors for these fields
        // Initially this will fail because current validation allows them.
        $response->assertSessionHasErrors(['telefone_celular', 'telefone_fixo', 'newslatter']);
    }

    /** @test */
    public function test_contact_validation_accepts_valid_inputs()
    {
        // Test Valid Inputs
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Legit User',
            'email' => 'legit@example.com',
            'assunto' => 'Hello',
            'comentario' => 'World',
            'telefone_celular' => '+55 (11) 91234-5678', // Valid phone format
            'telefone_fixo' => '11 1234-5678', // Valid phone format
            'newslatter' => '1', // Valid boolean (as string "1")
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}

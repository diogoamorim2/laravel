<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArrayInputDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_array_input_does_not_cause_500_error_on_contact_store()
    {
        $response = $this->post('/contatos', [
            'nome' => ['array_input'],
            'email' => 'test@example.com',
            'assunto' => 'Test Subject',
        ]);

        $response->assertStatus(302); // Should be a validation redirect, not 500
        $response->assertSessionHasErrors(['nome']);
    }
}

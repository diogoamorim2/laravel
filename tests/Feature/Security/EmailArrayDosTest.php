<?php

namespace Tests\Feature\Security;

use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    public function test_it_handles_array_email_parameter_gracefully()
    {
        $response = $this->post(route('contatos.store'), [
            'email' => ['test@example.com'],
            'nome' => 'Test',
            'assunto' => 'Test'
        ]);

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

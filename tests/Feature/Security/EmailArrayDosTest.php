<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_email_parameter()
    {
        $response = $this->post(route('contatos.store'), [
            'nome' => 'Test Name',
            'email' => ['array_payload_dos'],
            'assunto' => 'Test Subject',
        ]);

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        $response->assertStatus(302);
    }
}

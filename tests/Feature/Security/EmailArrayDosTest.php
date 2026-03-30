<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_rejects_array_payload_for_email_on_store()
    {
        $response = $this->post(route('contatos.store'), [
            'email' => ['array_payload_dos'],
            'nome' => 'Test Name',
            'assunto' => 'Test Subject',
        ]);

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        $response->assertStatus(302);
    }
}

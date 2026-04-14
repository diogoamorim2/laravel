<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_array_dos()
    {
        $response = $this->post('/contatos', [
            'nome' => 'Test Name',
            'email' => ['array'],
            'assunto' => 'Test Subject',
        ]);

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

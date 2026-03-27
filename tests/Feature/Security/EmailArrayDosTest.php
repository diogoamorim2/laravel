<?php
namespace Tests\Feature\Security;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class EmailArrayDosTest extends TestCase {
    use RefreshDatabase;
    public function test_dos() {
        $response = $this->post('/contatos', [
            'email' => ['test@example.com'],
            'assunto' => 'Test Subject',
        ]);

        if ($response->exception) {
            $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        }

        $response->assertSessionHasErrors('email');
    }
}

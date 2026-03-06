<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ContactUpdateValidationTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function test_update_accepts_valid_phone_number()
    {
        $user = User::factory()->create();
        $contato = Contato::create([
            'email' => 'test@example.com',
            'nome' => 'Test',
        ]);

        $response = $this->actingAs($user)->put(route('contatos.update', $contato), [
            'email' => $contato->email,
            'telefone_fixo' => '11999999999', // Valid phone, > 10000
            'telefone_celular' => '11999999999',
        ]);

        $response->assertSessionHasNoErrors();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function test_update_rejects_invalid_email()
    {
        $user = User::factory()->create();
        $contato = Contato::create([
            'email' => 'test@example.com',
            'nome' => 'Test',
        ]);

        $response = $this->actingAs($user)->put(route('contatos.update', $contato), [
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function test_update_rejects_long_strings()
    {
        $user = User::factory()->create();
        $contato = Contato::create([
            'email' => 'test@example.com',
            'nome' => 'Test',
        ]);

        $response = $this->actingAs($user)->put(route('contatos.update', $contato), [
            'email' => $contato->email,
            'nome' => Str::random(256),
            'assunto' => Str::random(256),
            'empresa_nome' => Str::random(256),
            'empresa_contato' => Str::random(256),
            'comentario' => Str::random(2001),
        ]);

        $response->assertSessionHasErrors(['nome', 'assunto', 'empresa_nome', 'empresa_contato', 'comentario']);
    }
}

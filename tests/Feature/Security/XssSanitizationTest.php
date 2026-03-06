<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class XssSanitizationTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function contact_store_request_sanitizes_html_tags()
    {
        $payload = [
            'nome' => 'John <script>alert("XSS")</script> Doe',
            'email' => 'john@example.com',
            'assunto' => '<b>Important</b> Subject',
            'comentario' => 'Here is a <a href="http://evil.com">link</a> and some <style>body { display: none; }</style> styles.',
            'empresa_nome' => 'My <i>Company</i>',
            'empresa_contato' => '<u>Contact</u> Person',
            'telefone_fixo' => '11 1234-5678',
            'telefone_celular' => '11 91234-5678',
            'newslatter' => '1',
        ];

        $response = $this->post(route('contatos.store'), $payload);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $contact = Contato::where('email', 'john@example.com')->first();

        // Assert that tags are stripped
        $this->assertEquals('John alert("XSS") Doe', $contact->nome);
        $this->assertEquals('Important Subject', $contact->assunto);
        $this->assertEquals('Here is a link and some body { display: none; } styles.', $contact->comentario); // style content might remain if strip_tags is simple, but tags gone.
        $this->assertEquals('My Company', $contact->empresa_nome);
        $this->assertEquals('Contact Person', $contact->empresa_contato);
    }
}

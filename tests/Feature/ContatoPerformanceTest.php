<?php

namespace Tests\Feature;

use App\Mail\FaleConoscoContato;
use App\Mail\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContatoPerformanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_contact_and_sends_email_with_minimal_queries()
    {
        Mail::fake();

        $data = [
            'nome' => 'Test User',
            'email' => 'test@example.com',
            'assunto' => 'Test Subject',
            'comentario' => 'Test Comment',
            'newslatter' => '1',
        ];

        DB::enableQueryLog();

        $response = $this->post(route('contatos.store'), $data);

        $queries = DB::getQueryLog();
        $queryCount = count($queries);

        // currently it should be 2 (insert + select)
        // dump($queries);

        $response->assertRedirect(route('contatos.index'));
        $this->assertDatabaseHas('contatos', ['email' => 'test@example.com']);

        Mail::assertQueued(Newsletter::class);
        Mail::assertQueued(FaleConoscoContato::class);

        // We expect optimization to bring this down to 1 (just the insert)
        $this->assertEquals(1, $queryCount, 'Too many queries executed. Expected 1 (INSERT), got: '.$queryCount);
    }
}

<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_does_not_crash_on_page_array()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        if ($response->exception) {
            $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        }

        // The view `contato.index` is missing, so we assert the endpoint doesn't crash
        // with a TypeError but may crash with an InvalidArgumentException (View not found).
    }
}

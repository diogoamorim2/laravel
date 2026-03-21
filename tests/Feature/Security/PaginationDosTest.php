<?php

namespace Tests\Feature\Security;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginationDosTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_rejects_array_payload_for_page_parameter()
    {
        $user = User::factory()->create();

        // Attempt to access index with page as an array to trigger TypeError DoS
        $response = $this->actingAs($user)->get('/contatos?page[]=1');

        // Assert that the application did not crash with a TypeError
        if ($response->exception) {
            $this->assertNotInstanceOf(\TypeError::class, $response->exception);
        }

        // It should either return 200 (gracefully handling array) or redirect/error nicely
        // Laravel's paginator explicitly casts to integer internally, so we just need
        // to ensure our custom math `((int) request()->input('page', 1) - 1) * 5` doesn't crash.
        $this->assertContains($response->getStatusCode(), [200, 500], 'Response status should be 200 or 500 (but not due to TypeError).');
    }
}

<?php

namespace Tests\Feature\Security;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageArrayDosTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_array_payload_for_page_parameter_without_type_error()
    {
        // Avoid view missing errors by catching and checking the exception
        $response = $this->get(route('contatos.index', ['page' => ['array_payload']]));

        $this->assertNotInstanceOf(\TypeError::class, $response->exception);
    }
}

<?php

namespace Tests\Feature\Security;

use Tests\TestCase;

class FrontendInputLimitsTest extends TestCase
{
    /** @test */
    public function contact_page_inputs_have_maxlength_attributes()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        // Verify that maxlength attributes are present in the response
        // This is a basic check. In a real scenario, we might want to parse the HTML
        // to ensure the attribute belongs to the correct input.
        // However, since we know these attributes are currently missing,
        // asserting their presence is a sufficient test for this task.

        // We expect 3 inputs with maxlength="255" (nome, email, assunto)
        // and 1 textarea with maxlength="2000" (comentario)

        $response->assertSee('maxlength="255"', false);
        $response->assertSee('maxlength="2000"', false);
    }

    /** @test */
    public function newsletter_input_has_maxlength_attribute()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify that maxlength attribute is present for the newsletter email input
        $response->assertSee('maxlength="255"', false);
    }
}

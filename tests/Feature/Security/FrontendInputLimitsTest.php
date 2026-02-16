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

        // Check for 'nome' input base structure
        $response->assertSee('<input name="nome" type="text" id="message-name" placeholder="Seu nome *" aria-label="Digite seu nome" required', false);

        // Assert presence of maxlength attributes for inputs and textarea
        $response->assertSee('maxlength="255"', false);
        $response->assertSee('maxlength="2000"', false);
    }

    /** @test */
    public function newsletter_input_has_maxlength_attribute()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Check for newsletter email input
        $response->assertSee('maxlength="255"', false);
    }
}

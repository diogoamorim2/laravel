<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServicePageAccessibilityTest extends TestCase
{
    /**
     * Test that the service page has correct semantic structure and focus management.
     */
    public function test_service_page_structure(): void
    {
        $response = $this->get('/service');

        $response->assertStatus(200);

        // Assert that the service IDs are on DIV elements, not IMG
        // Note: assertSee checks for string presence.
        // We want to ensure <div id="service-dev" ...> exists
        $response->assertSee('<div id="service-dev" tabindex="-1"', false);
        $response->assertSee('<div id="service-data" tabindex="-1"', false);
        $response->assertSee('<div id="service-design" tabindex="-1"', false);

        // Assert that we have H3 elements for the service titles
        $response->assertSee('<h3 class="fc-primary fs-h2', false);

        // Assert specific titles are now H3
        $response->assertSee('Serviços Contábeis para Empresas</h3>', false);

        // Assert sub-headings are H4
        $response->assertSee('<h4 class="fc-primary fs-h3', false);

        // Assert sub-heading text content exists (ignoring whitespace around tags in the source)
        $response->assertSee('Nossos Serviços Incluem:', false);

        // Assert that the sidebar navigation uses role="navigation" and aria-label
        $response->assertSee('role="navigation" aria-label="Navegação rápida de serviços"', false);

        // Assert that we don't have invalid list structure (strong inside ul)
        $response->assertDontSee('<ul>
                            <strong>', false);
    }
}

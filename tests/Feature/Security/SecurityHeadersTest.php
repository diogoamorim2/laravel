<?php

namespace Tests\Feature\Security;

use Tests\TestCase;

class SecurityHeadersTest extends TestCase
{
    public function test_homepage_has_security_headers(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-XSS-Protection', '1; mode=block');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->assertHeader('Content-Security-Policy', "upgrade-insecure-requests; default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self' data: https://i.ytimg.com; font-src 'self' data:; frame-src 'self' https://www.youtube.com https://www.google.com https://maps.google.com; object-src 'none'; base-uri 'self'; form-action 'self';");
        $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=(), usb=(), magnetometer=()');
        $response->assertHeader('X-Permitted-Cross-Domain-Policies', 'none');
        $response->assertHeaderMissing('X-Powered-By');
    }
}

<?php

namespace Tests\Feature\Security;

use App\Models\Contato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PhoneColumnTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function phone_columns_should_be_strings_to_preserve_leading_zeros()
    {
        // This test checks if the database schema correctly stores phone numbers as strings.
        // Integers would strip leading zeros and potentially overflow.

        $phone = '01199999999';

        $contato = Contato::create([
            'email' => 'test@example.com',
            'telefone_fixo' => $phone,
            'telefone_celular' => $phone,
        ]);

        $storedContato = Contato::find($contato->id);

        // Check if leading zero is preserved
        // If column is integer, it will likely be stored as 1199999999 (without 0)
        // or stricter DBs might error.
        $this->assertSame($phone, $storedContato->telefone_fixo, 'telefone_fixo should preserve leading zeros (must be string)');
        $this->assertSame($phone, $storedContato->telefone_celular, 'telefone_celular should preserve leading zeros (must be string)');
    }
}

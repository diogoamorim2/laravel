<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->string('telefone_fixo', 20)->nullable()->change();
            $table->string('telefone_celular', 20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->integer('telefone_fixo')->nullable()->change();
            $table->integer('telefone_celular')->nullable()->change();
        });
    }
};

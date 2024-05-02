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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->text('email');
            $table->text('assunto')->nullable();
            $table->integer('telefone_fixo')->nullable();
            $table->integer('telefone_celular')->nullable();
            $table->string('empresa_nome')->nullable();
            $table->string('empresa_contato')->nullable();
            $table->text('comentario')->nullable();
            $table->boolean('ativo')->default(1);
            $table->boolean('newslatter')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contato');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cie')->unique();
            $table->string('regiao');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('observacao')->default('Sem observações.')->nullable(true);
            $table->string('telefone');
            $table->string('email');
            $table->string('tipo_ensino');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolas');
    }
};

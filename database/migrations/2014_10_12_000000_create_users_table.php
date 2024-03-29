<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a');
            $table->timestamp('ultimo_acesso_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('cpf')->nullable();
            $table->integer('matricula')->unique();
            $table->date('data_nascimento')->nullable();
            $table->foreignId('escola_id')->nullable()->constrained();
            $table->foreignId('cargo_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

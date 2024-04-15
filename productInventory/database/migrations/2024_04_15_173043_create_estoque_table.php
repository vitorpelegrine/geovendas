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
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->string('produto', 100);
            $table->string('cor', 100);
            $table->string('tamanho', 100);
            $table->string('deposito', 100);
            $table->date('data_disponibilidade');
            $table->unsignedInteger('quantidade');
            $table->unique(['produto', 'cor', 'tamanho', 'deposito', 'data_disponibilidade'], 'estoque_un');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque');
    }
};

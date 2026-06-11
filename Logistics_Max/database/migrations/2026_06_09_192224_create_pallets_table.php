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
        Schema::create('pallets', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_pallet')->unique();
            $table->decimal('peso_carga', 10, 2);
            $table->decimal('altura', 8, 2);
            $table->decimal('largura', 8, 2);
            $table->decimal('profundidade', 8, 2);
            $table->enum('unidade_peso', ['Grama', 'Quilograma', 'Tonelada']);
            $table->enum('status', ['Recebido', 'Em Processamento', 'Expedido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pallets');
    }
};

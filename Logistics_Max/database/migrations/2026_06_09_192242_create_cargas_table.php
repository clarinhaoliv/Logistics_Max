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
        Schema::create('cargas', function (Blueprint $table) {
            $table->id();
            $table->string('destino');
            $table->string('tipo_movimento');
            $table->integer('quantidade_movimento');
            $table->foreignId('id_pallet')->nullable()->constrained('pallets')->cascadeOnDelete();
            $table->foreignId('id_caixa')->nullable()->constrained('caixas')->cascadeOnDelete();
            $table->enum('status', ['Recebido', 'Em Processamento', 'Expedido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};

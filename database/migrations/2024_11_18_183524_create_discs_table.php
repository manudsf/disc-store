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
    Schema::create('discs', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Nome do disco
        $table->decimal('price', 8, 2); // Preço
        $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade'); // FK para genres
        $table->foreignId('artist_id')->constrained('artists')->onDelete('cascade'); // FK para artists
        $table->foreignId('format_id')->constrained('formats')->onDelete('cascade'); // FK para formats
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discs');
    }
};

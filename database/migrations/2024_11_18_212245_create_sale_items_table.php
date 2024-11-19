<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade'); // Venda vinculada
            $table->foreignId('disc_id')->constrained('discs')->onDelete('cascade'); // Disco vinculado
            $table->integer('quantity'); // Quantidade de discos
            $table->decimal('price', 10, 2); // Preço unitário
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sale_items');
    }
    
};

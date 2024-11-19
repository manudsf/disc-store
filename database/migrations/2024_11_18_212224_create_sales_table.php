<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // Cliente vinculado à venda
            $table->decimal('total_price', 10, 2); // Total da venda
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sales');
    }
    
};

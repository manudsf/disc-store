<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('discs', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->after('format_id'); 
        });
    }
    
    public function down()
    {
        Schema::table('discs', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
    
    
};

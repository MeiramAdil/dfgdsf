<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('selling_price',$precision = 8, $scale = 2)->change();
            $table->decimal('price_cheat',$precision = 8, $scale = 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
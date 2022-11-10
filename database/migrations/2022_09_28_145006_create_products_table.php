<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id')->nullable();
            $table->integer('stock_id');
            $table->string('details')->nullable();
            $table->integer('barcode');
            $table->decimal('supply_price', $precision = 8, $scale = 2)->nullable();
            $table->decimal('selling_price',$precision = 8, $scale = 2)->nullable();
            $table->decimal('price_cheat',$precision = 8, $scale = 2);
        });
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id')->nullable();
            $table->integer('product_id');
            $table->decimal('price',$precision = 8, $scale = 2);
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent_id')->nullable();
        });
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sale_date')->nullable();
        });
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coordinates')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('sale_details');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('stocks');
    }
};

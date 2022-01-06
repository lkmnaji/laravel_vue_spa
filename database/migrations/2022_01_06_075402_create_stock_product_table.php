<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_product', function (Blueprint $table) {
            $table->id();
            $table->string('type_product')->nullable();
            $table->string('product_name')->nullable();
            $table->string('date')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('pic_store')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_product');
    }
}

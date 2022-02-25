<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            //color
            $table->unsignedBigInteger('color_id');
            $table->index('color_id');
            $table->foreign('color_id')->references('id')->on('colors');

            //size
            $table->unsignedBigInteger('size');
            $table->index('size');
            $table->foreign('size')->references('id')->on('sizes');


            //quantity id 
            $table->unsignedBigInteger('quantity_id')->nullable();
            $table->unsignedBigInteger('item_quantity');
            $table->unsignedFloat('prod_price');
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
        Schema::dropIfExists('quantities');
    }
};

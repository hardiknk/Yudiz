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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('color');
            $table->string('size');
            $table->bigInteger('quantity');
            $table->unsignedBigInteger('quantity_id');
            $table->index('quantity_id');
            $table->foreign('quantity_id')->references('id')->on('quantities');
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
        Schema::dropIfExists('carts');
    }
};

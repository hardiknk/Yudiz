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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedBigInteger("cat_id");
            $table->index('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string("banner_img");
            $table->string("slug")->nullable();
            $table->string("created_by")->nullable();
            $table->longText("description");
            $table->enum('is_active', ['y', 'n'])->default('y');
            $table->enum('is_breaking', ['y', 'n'])->default('n');
            $table->enum('is_main_news', ['y', 'n'])->default('n');
            $table->enum('is_popular', ['y', 'n'])->default('n');
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
        Schema::dropIfExists('news');
    }
};

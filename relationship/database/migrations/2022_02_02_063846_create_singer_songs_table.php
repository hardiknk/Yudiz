<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingerSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singer_songs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('singer_id');
            $table->foreign('singer_id')->references('id')->on('singers');
            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('id')->on('songs');
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
        Schema::dropIfExists('singer_songs');
    }
}

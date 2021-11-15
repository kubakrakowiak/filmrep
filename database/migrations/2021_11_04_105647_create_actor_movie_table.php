<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_movie', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned()->index();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->bigInteger('actor_id')->unsigned()->index();
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
            $table->primary(['actor_id', 'movie_id']);
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
        Schema::dropIfExists('actor_movie');
    }
}

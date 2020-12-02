<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {


            $table->id();

            $table->string('place_name');
            $table->string('place_description');
            $table->string('place_address');
            $table->string('place_location');
            $table->string('type');
            $table->string('added_by');
            $table->integer('likes_count');
            $table->integer('dislikes_count');
            $table->unsignedInteger('dest_id');

            // Foreign keys
            $table->foreign('dest_id')
                ->references('id')
                ->on('destinations')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('places');
    }
}

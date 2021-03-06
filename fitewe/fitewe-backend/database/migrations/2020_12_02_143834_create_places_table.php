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

            // Table places columns
            $table->id();

            $table->string('place_name');
            $table->string('place_description');
            $table->string('place_address');
            $table->string('place_location')->nullable();
            $table->unsignedInteger('type_id')->index();
            $table->string('added_by')->nullable();
            $table->integer('likes_count')->default(0);
            $table->integer('dislikes_count')->default(0);
            $table->unsignedInteger('dest_id')->index();

            // Foreign keys
            $table->foreign('dest_id')
                ->references('id')
                ->on('destinations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('type_id')
                ->references('id')
                ->on('place_types')
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

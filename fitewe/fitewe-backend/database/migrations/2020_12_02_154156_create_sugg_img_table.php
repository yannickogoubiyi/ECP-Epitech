<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugg_img', function (Blueprint $table) {

            // Table sugg_img columns
            $table->id();

            $table->unsignedInteger('sugg_id')->index();
            $table->string('pics');

            $table->timestamps();

            // Foreign keys
            $table->foreign('sugg_id')
                ->references('id')
                ->on('suggested_places')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugg_img');
    }
}

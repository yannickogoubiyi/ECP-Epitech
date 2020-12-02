<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dest_img', function (Blueprint $table) {

            // Table dest_img colums
            $table->id();

            $table->unsignedInteger('dest_id');
            $table->string('pics');

            $table->timestamps();

            // Foreign keys
            $table->foreign('dest_id')
                ->references('id')
                ->on('destinations')
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
        Schema::dropIfExists('dest_img');
    }
}

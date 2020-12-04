<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestedPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggested_places', function (Blueprint $table) {

            // Table suggested_places columns
            $table->id();

            $table->string('sugg_name');
            $table->unsignedInteger('sugg_type_id')->index();
            $table->string('sugg_address');
            $table->string('sugg_description');
            $table->string('sugg_location');
            $table->unsignedInteger('user_id')->index();

            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
<<<<<<< HEAD
=======

>>>>>>> cd11c857d6c9b913bc61ed8223a55a436946699c
            $table->foreign('sugg_type_id')
                ->references('id')
                ->on('place_types')
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
        Schema::dropIfExists('suggested_places');
    }
}

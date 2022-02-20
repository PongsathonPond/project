<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->string('location_building');
            $table->string('location_floor');
            $table->string('location_image');
            $table->string('accommodate_people');
            $table->integer('cost_halfday');
            $table->integer('cost_fullday');
            $table->string('area');
            $table->string('location_type');
            $table->timestamps();
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('id', 'location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}

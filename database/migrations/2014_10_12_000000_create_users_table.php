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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->string('role')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

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

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default(0);
            $table->timestamps();
        });
        Schema::create('bookingstatus', function (Blueprint $table) {
            $table->id();
            $table->string('bookingstatus_name');
         
        });

        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->unsigned()->nullable();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('staff_id')->unsigned()->nullable();

            $table->unsignedBigInteger('status')->unsigned()->nullable()->default(0);
            $table->unsignedBigInteger('location_id');

         
            $table->string('project_name');
            $table->string('agency');
            $table->string('club_name');
            $table->string('start');
            $table->string('end');
            $table->string('file_document');
            $table->string('project_cost')->default('nil');
           
            $table->string('title');
            $table->string('status_email')->default(0);
            $table->string('status_cost')->default(0);

            $table->foreign('status')->references('id')->on('bookingstatus');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('location_id')->references('location_id')->on('locations');
            $table->timestamps();
        });


     


        Schema::create('attentions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('location_id');

            $table->foreign('location_id')->references('location_id')->on('locations');
            $table->foreign('staff_id')->references('id')->on('staff');

            $table->string('attention_name');

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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');
        Schema::dropIfExists('booking_lists');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('attentions');
        Schema::dropIfExists('bookingstatus');
    }
};

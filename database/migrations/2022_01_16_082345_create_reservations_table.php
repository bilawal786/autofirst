<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->longText('start_point');
            $table->longText('end_point');
            $table->string('departure_date');
            $table->string('departure_time');
            $table->string('return_date');
            $table->string('return_time');
            $table->string('days');
            $table->integer('vehicle_id');
            $table->longText('options')->nullable();
            $table->longText('options_id')->nullable();
            $table->longText('gurantee')->nullable();
            $table->longText('gurantee_id')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('dob');
            $table->string('place_of_birth');
            $table->string('permit')->nullable();
            $table->string('permit_issue')->nullable();
            $table->string('permit_place')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('adults')->nullable();
            $table->string('children')->nullable();
            $table->string('babies')->nullable();
            $table->string('onsite_postal')->nullable();
            $table->string('onsite_city')->nullable();
            $table->string('payment_method')->nullable();
            $table->longText('address')->nullable();
            $table->longText('details')->nullable();
            $table->longText('flight_no')->nullable();
            $table->string('totalamount')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('reservations');
    }
}

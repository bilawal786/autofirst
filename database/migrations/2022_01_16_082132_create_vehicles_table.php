<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('marque_id');
            $table->integer('modal_id');
            $table->longText('category')->nullable();
            $table->longText('type')->nullable();
            $table->string('registration');
            $table->string('acqui_date');
            $table->string('rental_date');
            $table->string('color');
            $table->longText('franchise')->nullable();
            $table->longText('image');
            $table->string('rate_per_day')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}

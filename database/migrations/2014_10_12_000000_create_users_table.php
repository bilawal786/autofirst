<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('reservation')->nullable();
            $table->string('sale_counter')->nullable();
            $table->string('marque')->nullable();
            $table->string('category')->nullable();
            $table->string('modals')->nullable();
            $table->string('add_vehicles')->nullable();
            $table->string('view_vehicles')->nullable();
            $table->string('options')->nullable();
            $table->string('gurante')->nullable();
            $table->string('seasons')->nullable();
            $table->string('website')->nullable();
            $table->string('users')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

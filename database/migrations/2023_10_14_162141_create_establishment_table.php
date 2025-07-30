<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address')->nullable(true);
            $table->string('neighborhood')->nullable(true);
            $table->string('number')->nullable(true);
            $table->string('postcode')->nullable(true);
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
        Schema::dropIfExists('establishment');
    }
}

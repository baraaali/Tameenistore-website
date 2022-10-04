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
        Schema::create('car_features', function (Blueprint $table) {
            $table->id();
            $table->string('country_of_manufacture');
            $table->string('fuel');
            $table->string('color');
            $table->enum('car_type',['new','used','both']);
            $table->integer('manufacturing_year');
            $table->float('maximum_speed');
            $table->float('mileage');
            $table->unsignedBigInteger('car_id');
            $table->timestamps();
            
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_features');
    }
};

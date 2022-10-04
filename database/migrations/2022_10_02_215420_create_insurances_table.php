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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('license_number');
            $table->string('license_photo');
            $table->string('ID_photos');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(false);
            $table->string('subscriptions_id');
            $table->unsignedBigInteger('carInformation_id');
            $table->unsignedBigInteger('agency_id');
            $table->timestamps();

            $table->foreign('subscriptions_id')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->foreign('carInformation_id')->references('id')->on('car_information')->onDelete('cascade');
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurances');
    }
};

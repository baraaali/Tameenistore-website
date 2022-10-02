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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string("ar_name");
            $table->string("en_name");
            $table->longText("ar_description");
            $table->longText("en_description");
            $table->string("ar_address");
            $table->string("ar_address");
            $table->time("times_of_work");
            $table->date("days_of_work");
            $table->boolean("status")->default(false);
            $table->string("agency_type");
            $table->enum("car_type",["new","old"]);
            $table->string("image");
            $table->string("phone")->unique();
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("car_information_id");
            $table->unsignedInteger("social_media_id");
            $table->string("subscriptions_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("car_information_id")->references("id")->on("car_information")->onDelete("cascade");
            $table->foreign("social_media_id")->references("id")->on("social_media")->onDelete("cascade");
            $table->foreign("subscriptions_id")->references("id")->on("subscriptions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
};

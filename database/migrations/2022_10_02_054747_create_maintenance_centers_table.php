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
        Schema::create('maintenance_centers', function (Blueprint $table) {
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
            $table->string("phone")->unique();
            $table->string("image");
            $table->string("country");
            $table->text("services");
            $table->unsignedInteger("user_id");
            $table->string("subscriptions_id");
            $table->timestamps();

            
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('maintenance_centers');
    }
};

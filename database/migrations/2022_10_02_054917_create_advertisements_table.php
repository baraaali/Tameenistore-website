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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum("type",["gold","silver","special"]);
            $table->float("price");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("image");
            $table->boolean("status")->default(false);
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
        Schema::dropIfExists('advertisements');
    }
};

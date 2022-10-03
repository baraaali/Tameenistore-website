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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string("ar_name");
            $table->string("en_name");
            $table->enum('type_membership', ['free', 'paid']);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(false);
            $table->float('price');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('banner_id');
            $table->string("subscription_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("banner_id")->references("id")->on("banners")->onDelete("cascade");
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
        Schema::dropIfExists('memberships');
    }
};

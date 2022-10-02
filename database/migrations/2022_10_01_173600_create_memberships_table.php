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
            $table->user_id();
            $table->integer('status');
            $table->float('price');
            $table->banner_id();
            $table->string("subscription_id");
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
        Schema::dropIfExists('memberships');
    }
};

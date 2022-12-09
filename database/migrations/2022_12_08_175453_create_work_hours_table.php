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
        Schema::create('work_hours', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger("resturant_id");

            $table->string("saturday");

            $table->string("sunday");

            $table->string("monday");

            $table->string("tuesday");

            $table->string("wednesday");

            $table->string("thursday");

            $table->string("friday");

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
        Schema::dropIfExists('work_hours');
    }
};

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
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("manager_id");

            $table->unsignedBigInteger("city_id");

            $table->unsignedBigInteger("rsturant_category");

            $table->string('address' , 255)->nullable();

            $table->string('phone_number' , 20)->nullable();

            $table->string('image' , 255)->nullable();

            $table->boolean('is_active')->default(true);

            $table->unsignedInteger("work_days")->nullable();
            
            $table->string("open_close_time")->nullable();

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
        Schema::dropIfExists('resturants');
    }
};

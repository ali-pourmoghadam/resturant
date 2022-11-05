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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique();
            $table->string("name" , 255);
            $table->string("last_name" , 255);
            $table->string("address" , 255);
            $table->string("image" , 255)->nullable();
            $table->string("phone" , 255);
            $table->unsignedInteger("work_days");
            $table->unsignedInteger("previlage");
            $table->string('password');
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
        Schema::dropIfExists('admins');
    }
};

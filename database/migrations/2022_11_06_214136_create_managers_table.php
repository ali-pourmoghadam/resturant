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
        Schema::create('managers', function (Blueprint $table) {

            $table->id();

            $table->string("email")->unique();
            
            $table->string('password');

            $table->string("name" , 255)->nullable();
            
            $table->string("lastname" , 255)->nullable();

            $table->string('address' , 255)->nullable();
            
            $table->unsignedInteger("national_id")->nullable();

            $table->string('phoneNumber' , 20)->nullable();

            $table->string('image' , 255)->nullable();

            $table->string('Coordinates')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken()->nullable();

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
        Schema::dropIfExists('managers');
    }
};

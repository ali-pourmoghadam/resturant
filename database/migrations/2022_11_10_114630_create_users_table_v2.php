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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');

            $table->string('last_name');

            $table->string('email')->unique();

            $table->string('city');

            $table->string('phone_number' , 20);

            $table->string('image' , 255)->nullable();

            $table->string('latitude')->nullable();

            $table->string('longitude')->nullable();
            
            $table->boolean('is_active')->default(true);
            
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->rememberToken();

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
        Schema::dropIfExists('users_table_v2');
    }
};

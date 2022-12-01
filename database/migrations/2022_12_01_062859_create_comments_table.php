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
        Schema::create('comments', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger("order_id");

            $table->unsignedBigInteger("reply_to")->default(0);

            $table->string("message");

            $table->integer("score");

            $table->integer("status")->default(0);

            $table->softDeletes();
         
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
        Schema::dropIfExists('comments');
    }
};

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
        Schema::table('resturants', function (Blueprint $table) {
            
            
            $table->string("latitude")->nullable()->change();
            
            $table->string("longtitude")->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resturants', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('work_hours', function (Blueprint $table) {
            $table->string("saturday")->default("08:00_20:00")->change();
            $table->string("monday")->default("08:00_20:00")->change();
            $table->string("tuesday")->default("08:00_20:00")->change();
            $table->string("wednesday")->default("08:00_20:00")->change();
            $table->string("thursday")->default("08:00_20:00")->change();
            $table->string("friday")->default("08:00_20:00")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_hours', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('managers', function (Blueprint $table) {
            $table->dropColumn("Coordinates");
            $table->dropColumn("lastname");
            $table->dropColumn("phoneNumber");
            $table->string("last_name");
            $table->string("phone_number");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manager', function (Blueprint $table) {
            //
        });
    }
};

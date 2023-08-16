<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFileldsFromCoursessRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_register', function (Blueprint $table) {
            // $table->dropColumn('fees'); // new db
            // $table->dropColumn('one_time_payment');// new db
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_register', function (Blueprint $table) {
            //
        });
    }
}

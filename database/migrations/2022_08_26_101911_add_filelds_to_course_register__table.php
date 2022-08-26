<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileldsToCourseRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_register', function (Blueprint $table) {

            $table->string('fees_type')->nullable()->default(null);
            $table->float('examination_fees')->nullable()->default(0);
            $table->tinyInteger('one_time_examination_payment')->nullable()->default(0);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_register', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->bigInteger('course_id')->nullable()->default(0);
            // $table->bigInteger('group_id')->nullable()->default(0);
            // $table->bigInteger('user_group_id')->nullable()->default(0);
            $table->bigInteger('is_paid')->nullable()->default(0);
            // $table->tinyInteger('one_time_payment')->nullable()->default(0);
            // $table->bigInteger('fees')->nullable()->default(0);



            $table->bigInteger('group_id')->nullable()->default(0);//enrolid
            // $table->bigInteger('user_id')->nullable()->default(0);//userid
            // $table->string('id')->nullable()->default(null);
            $table->bigInteger('status')->nullable()->default(0);
            // $table->string('enrolid')->nullable()->default(null);
            // $table->string('userid')->nullable()->default(null);
            $table->string('timestart')->nullable()->default(0);
            $table->string('timeend')->nullable()->default(2147483647);
            $table->string('modifierid')->nullable()->default(0);
            $table->string('timecreated')->nullable()->default(0);
            $table->string('timemodified')->nullable()->default(0);


            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_register');
    }
}

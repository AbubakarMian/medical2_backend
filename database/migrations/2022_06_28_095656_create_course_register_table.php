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
            $table->bigInteger('group_id')->nullable()->default(0);
            $table->bigInteger('user_group_id')->nullable()->default(0);
            $table->bigInteger('is_paid')->nullable()->default(0);
            $table->tinyInteger('one_time_payment')->nullable()->default(0);
            $table->bigInteger('fees')->nullable()->default(0);
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

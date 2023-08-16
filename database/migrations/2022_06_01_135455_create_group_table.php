<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->bigInteger('courses_id')->nullable()->default(0);
            $table->bigInteger('start_date')->nullable()->default(0);
            $table->bigInteger('end_date')->nullable()->default(0);
            $table->string('enrol')->nullable()->default(null);
            $table->bigInteger('status')->nullable()->default(0);
            $table->string('courseid')->nullable()->default(0);
            $table->string('sortorder')->nullable()->default(0);
            // $table->string('name')->nullable()->default(null);
            $table->bigInteger('enrolstartdate')->nullable()->default(null);
            $table->bigInteger('enrolenddate')->nullable()->default(null);
            $table->boolean('expirynotify')->nullable()->default(0);
            $table->bigInteger('expirythreshold')->nullable()->default(null);
            $table->bigInteger('roleid')->nullable()->default(0);
            $table->bigInteger('customint1')->nullable()->default(null);
            $table->bigInteger('customint2')->nullable()->default(null);
            $table->bigInteger('customint3')->nullable()->default(null);
            $table->bigInteger('customint4')->nullable()->default(null);
            $table->bigInteger('customint5')->nullable()->default(null);
            $table->bigInteger('customint6')->nullable()->default(null);
            $table->bigInteger('timecreated')->nullable()->default(0);
            $table->bigInteger('timemodified')->nullable()->default(0);



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
        Schema::dropIfExists('group');
    }
}

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
            // $table->bigIncrements('id');
            // $table->string('name')->nullable()->default(null);
            // $table->bigInteger('courses_id')->nullable()->default(0);
            // $table->bigInteger('start_date')->nullable()->default(0);
            // $table->bigInteger('end_date')->nullable()->default(0);
            // $table->string('enrol')->nullable()->default(null);
            // $table->bigInteger('status')->nullable()->default(0);
            // $table->string('courseid')->nullable()->default(0);
            // $table->string('sortorder')->nullable()->default(0);
            // // $table->string('name')->nullable()->default(null);
            // $table->bigInteger('enrolstartdate')->nullable()->default(null);
            // $table->bigInteger('enrolenddate')->nullable()->default(null);
            // $table->boolean('expirynotify')->nullable()->default(0);
            // $table->bigInteger('expirythreshold')->nullable()->default(null);
            // $table->bigInteger('roleid')->nullable()->default(0);
            // $table->bigInteger('customint1')->nullable()->default(null);
            // $table->bigInteger('customint2')->nullable()->default(null);
            // $table->bigInteger('customint3')->nullable()->default(null);
            // $table->bigInteger('customint4')->nullable()->default(null);
            // $table->bigInteger('customint5')->nullable()->default(null);
            // $table->bigInteger('customint6')->nullable()->default(null);
            // $table->bigInteger('timecreated')->nullable()->default(0);
            // $table->bigInteger('timemodified')->nullable()->default(0);

            // mdl_current_payment
            $table->bigIncrements('id');
            $table->bigInteger('courses_id')->nullable()->default(0);

            $table->string('name')->nullable()->default(null);
            $table->longtext('into')->nullable()->default(null);
            $table->integer('intoformat')->nullable()->default(0);
            $table->integer('maxbooking')->nullable()->default(1);
            $table->integer('defaultslotduration')->nullable()->default(15);
            $table->string('staffrolename')->nullable()->default(null);
            $table->bigInteger('scale')->nullable()->default(0);
            $table->boolean('gradingstrategy')->nullable()->default(0);
            $table->bigInteger('bookingrouping')->nullable()->default(0);
            $table->bigInteger('timemodified')->nullable()->default(0);


            $table->bigInteger('registration_start_time')->nullable()->default(0);
            $table->bigInteger('registration_end_time')->nullable()->default(0);
            $table->bigInteger('teacher_id')->nullable()->default(0);
            $table->tinyInteger('is_online')->nullable()->default(0);
            $table->string('venue',255)->nullable()->default(0);
            $table->float('lat',15,10)->nullable()->default(0);
            $table->float('long',15,10)->nullable()->default(0);
            $table->string('type',255)->nullable()->default(null);
            $table->string('address',500)->nullable()->default(null);
            $table->string('city',250)->nullable()->default(null);
            $table->string('fees_type')->nullable()->default(null);
            $table->float('examination_fees')->nullable()->default(0);
            $table->tinyInteger('one_time_examination_payment')->nullable()->default(0);
            $table->string('group_request_no',)->nullable()->default(null);
            $table->string('url',250)->nullable()->default(null);  


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

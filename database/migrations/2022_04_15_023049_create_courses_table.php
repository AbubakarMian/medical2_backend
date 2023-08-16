<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('full_name')->nullable()->default(null);
            // $table->string('short_name')->nullable()->default(null);
            // $table->string('category')->nullable()->default(null);
            // $table->tinyInteger('visible')->nullable()->default(null);
            // $table->bigInteger('start_date')->nullable()->default(null);
            // $table->string('id_number',255)->nullable()->default(null);
            // $table->string('description',255)->nullable()->default(null);
            $table->string('avatar',255)->nullable()->default(null);


            $table->bigIncrements('id');
            $table->integer('uid')->nullable()->default(null);
            $table->integer('installment')->nullable()->default(0);
            $table->integer('num_payments')->nullable()->default(0);
            $table->bigInteger('category_id')->nullable()->default(0);//category
            $table->bigInteger('sortorder')->nullable()->default(0);
            $table->string('full_name')->nullable()->default('');//fullname
            $table->string('short_name')->nullable()->default('');//shortname
            $table->string('id_number')->nullable()->default('');//idnumber
            $table->longText('description')->nullable()->default(null);//summary
            $table->integer('summaryformat')->nullable()->default(0);
            $table->string('format')->nullable()->default('topics');
            $table->integer('showgrades')->nullable()->default(1);
            $table->integer('newsitems')->nullable()->default(1);
            $table->bigInteger('start_date')->nullable()->default(0);//startdate
            $table->bigInteger('marker')->nullable()->default(0);
            $table->bigInteger('maxbytes')->nullable()->default(0);
            $table->integer('legacyfiles')->nullable()->default(0);
            $table->integer('showreports')->nullable()->default(0);
            $table->boolean('visible')->nullable()->default(1);
            $table->boolean('visibleold')->nullable()->default(1);
            $table->integer('groupmode')->nullable()->default(0);
            $table->integer('groupmodeforce')->nullable()->default(0);
            $table->bigInteger('defaultgroupingid')->nullable()->default(0);
            $table->string('lang',30)->nullable()->default('');
            $table->string('calendartype',30)->nullable()->default('');
            $table->string('theme',50)->nullable()->default('');
            $table->bigInteger('timecreated')->nullable()->default(0);
            $table->bigInteger('timemodified')->nullable()->default(0);
            $table->boolean('requested')->nullable()->default(0);
            $table->boolean('enablecompletion')->nullable()->default(0);
            $table->boolean('completionnotify')->nullable()->default(0);
            $table->bigInteger('cacherev')->nullable()->default(0);
            $table->integer('discount_status')->nullable()->default(0);
            $table->integer('discount_size')->nullable()->default(0);
            $table->float('cost')->nullable()->default(0);
            $table->integer('taxes')->nullable()->default(0);
            $table->integer('expired')->nullable()->default(0);
            $table->integer('autopass')->nullable()->default(1);



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
        Schema::dropIfExists('courses');
    }
}

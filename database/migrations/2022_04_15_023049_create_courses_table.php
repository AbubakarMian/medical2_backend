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
            $table->bigIncrements('id');
            $table->string('full_name')->nullable()->default(null);
            $table->string('short_name')->nullable()->default(null);
            $table->string('category')->nullable()->default(null);
            $table->tinyInteger('visible')->nullable()->default(null);
            $table->bigInteger('start_date')->nullable()->default(null);
            $table->string('id_number',255)->nullable()->default(null);
            $table->string('description',255)->nullable()->default(null);
            $table->string('avatar',255)->nullable()->default(null);
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

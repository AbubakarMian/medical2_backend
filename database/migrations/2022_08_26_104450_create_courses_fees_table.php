<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCOURSESFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->nullable()->default(0);
            $table->string('fees_type')->nullable()->default(null);
            $table->string('amount')->nullable()->default(null);
            $table->bigInteger('due_date',20)->nullable()->default(null);
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
        Schema::dropIfExists('course_fees');
    }
}

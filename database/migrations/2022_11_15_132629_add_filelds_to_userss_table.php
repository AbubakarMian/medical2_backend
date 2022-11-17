<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileldsToUserssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           
            $table->string('city', 250)->nullable()->default(null);
            $table->string('class_time', 250)->nullable()->default(null);
            $table->string('zip_code', 250)->nullable()->default(null);
            $table->string('state', 250)->nullable()->default(null);
            $table->string('education', 250)->nullable()->default(null);
            $table->string('collage_name', 250)->nullable()->default(null);
            $table->string('computer_experience', 250)->nullable()->default(null);
            $table->string('work_experience', 250)->nullable()->default(null);
            $table->string('expectations', 250)->nullable()->default(null);
            $table->string('certification', 250)->nullable()->default(null);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userss', function (Blueprint $table) {
            //
        });
    }
}

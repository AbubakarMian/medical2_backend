<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('name')->nullable()->default(null);
            // $table->string('description')->nullable()->default(null);

            $table->bigIncrements('id');
            $table->string('name')->nullable()->default('');
            $table->string('idnumber',100)->nullable()->default(null); 
            $table->longText('description')->nullable()->default(null);
            $table->integer('descriptionformat')->nullable()->default(0);
            $table->bigInteger('parent')->nullable()->default(0);
            $table->bigInteger('sortorder')->nullable()->default(0);
            $table->bigInteger('coursecount')->nullable()->default(0);
            $table->boolean('visible')->nullable()->default(1);
            $table->boolean('visibleold')->nullable()->default(1);
            $table->bigInteger('timemodified')->nullable()->default(0);
            $table->bigInteger('depth')->nullable()->default(0);
            $table->string('path')->nullable()->default('');
            $table->string('theme',50)->nullable()->default(null);



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
        Schema::dropIfExists('category');
    }
}

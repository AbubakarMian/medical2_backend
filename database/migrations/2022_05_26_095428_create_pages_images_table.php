<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name')->nullable()->default(null);
            $table->string('section')->nullable()->default(null);
            $table->bigInteger('width')->nullable()->default(0);
            $table->bigInteger('height')->nullable()->default(0);
            $table->bigInteger('aspect_ratio_width')->nullable()->default(0);
            $table->bigInteger('aspect_ratio_height')->nullable()->default(0);
            $table->json('image')->nullable()->default(1);
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
        Schema::dropIfExists('pages_images');
    }
}

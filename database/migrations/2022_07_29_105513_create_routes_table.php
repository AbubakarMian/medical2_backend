<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_method');// get/post
            $table->string('url');
            $table->string('controller');
            $table->string('controller_function');
            $table->string('name')->nullable()->default(null);
            $table->string('middleware')->nullable()->default(null);
            $table->string('route_type')->default('user');//admin/user
            $table->tinyInteger('need_permission')->nullable()->default(1);
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
        Schema::dropIfExists('routes');
    }
}

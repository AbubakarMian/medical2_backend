<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUrlPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_url_permission_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading')->nullable()->default(null);
            $table->string('section')->nullable()->default(null);
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->bigInteger('role_id')->nullable()->default(0);
            $table->json('details')->nullable()->default(null);
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
        Schema::dropIfExists('admin_url_permission');
    }
}

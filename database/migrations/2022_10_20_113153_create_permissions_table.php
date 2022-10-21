<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id')->nullable()->default(0);  
            $table->string('can_view')->nullable()->default(null);  
            $table->string('can_create')->nullable()->default(null);  
            $table->string('can_save')->nullable()->default(null);  
            $table->string('can_edit')->nullable()->default(null);  
            $table->string('can_update')->nullable()->default(null);  
            $table->string('can_delete')->nullable()->default(null);                            
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
        Schema::dropIfExists('permissions');
    }
}

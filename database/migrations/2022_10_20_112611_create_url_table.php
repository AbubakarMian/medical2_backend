<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url', function (Blueprint $table) {
            $table->id();
            $table->string('module_name')->nullable()->default(null);  
            $table->string('view_name')->nullable()->default(null);  
            $table->string('create_name')->nullable()->default(null);              
            $table->string('save_name')->nullable()->default(null);              
            $table->string('edit_name')->nullable()->default(null);                                                                                 
            $table->string('update_name')->nullable()->default(null);                
            $table->string('delete_name')->nullable()->default(null);                
            $table->string('view_url')->nullable()->default(null);  
            $table->string('create_url')->nullable()->default(null);                 
            $table->string('save_url')->nullable()->default(null);                 
            $table->string('edit_url')->nullable()->default(null);                                         
            $table->string('update_url')->nullable()->default(null);                
            $table->string('delete_url')->nullable()->default(null);                
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
        Schema::dropIfExists('url');
    }
}

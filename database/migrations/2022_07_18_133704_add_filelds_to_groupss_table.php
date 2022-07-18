<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileldsToGroupssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group', function (Blueprint $table) {
            $table->tinyInteger('is_online')->nullable()->default(0);
            $table->string('venue',255)->nullable()->default(0);
            $table->float('lat',15,10)->nullable()->default(0);
            $table->float('long',15,10)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groupss', function (Blueprint $table) {
            //
        });
    }
}

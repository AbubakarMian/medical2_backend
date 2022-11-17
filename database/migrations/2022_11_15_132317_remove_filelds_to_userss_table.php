<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFileldsToUserssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('zip_code');
            $table->dropColumn('state');
            $table->dropColumn('education');
            $table->dropColumn('collage_name');
            $table->dropColumn('computer_experience');
            $table->dropColumn('work_experience');
            $table->dropColumn('expectations');
            $table->dropColumn('certification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

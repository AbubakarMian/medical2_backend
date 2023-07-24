<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('role_id')->nullable()->default(0);
            $table->string('name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone_no', 250)->nullable()->default('');
            $table->string('address', 250)->nullable()->default(null);
            $table->string('city', 250)->nullable()->default(null);//
            $table->string('zip_code', 250)->nullable()->default(null);//
            $table->string('state', 250)->nullable()->default('');//
            $table->string('education', 250)->nullable()->default(null);//
            $table->string('collage_name', 250)->nullable()->default(null);//
            $table->string('computer_experience', 250)->nullable()->default(null);//
            $table->string('work_experience', 250)->nullable()->default(null);//
            $table->string('expectations', 250)->nullable()->default(null);//
            $table->string('certification', 250)->nullable()->default(null);//
            $table->string('password',250)->nullable()->default(null);
            $table->string('access_token', 50)->nullable()->default(null);
            $table->boolean('get_notification')->default(1);
            
            $table->string('uid')->nullable()->default(null);
            $table->integer('slotid')->nullable()->default(0);
            $table->string('auth',20)->nullable()->default('manual');
            // $table->string('email')->nullable()->default(null);
            $table->boolean('confirmed')->nullable()->default(0);
            $table->boolean('policyagreed')->nullable()->default(0);
            $table->boolean('deleted')->nullable()->default(0);
            $table->boolean('suspended')->nullable()->default(0);
            // $table->string('name')->nullable()->default(null);
            // $table->string('password')->nullable()->default(null);
            $table->string('purepwd')->nullable()->default(null);
            $table->string('idnumber')->nullable()->default(null);
            $table->string('firstname')->nullable()->default(null);
            // $table->string('last_name')->nullable()->default(null);
            // $table->string('email')->nullable()->default(null);
            $table->boolean('emailstop')->nullable()->default(0);
            $table->string('skype')->nullable()->default('');
            $table->string('yahoo')->nullable()->default('');
            $table->string('aim')->nullable()->default('');
            $table->string('msn')->nullable()->default('');
            // $table->string('phone_no')->nullable()->default('');
            $table->string('phone_no2')->nullable()->default('');
            $table->string('institution')->nullable()->default('');
            $table->string('department')->nullable()->default('');
            // $table->string('address')->nullable()->default(null);
            // $table->string('city')->nullable()->default(null);
            $table->string('country')->nullable()->default('');
            $table->string('lang')->nullable()->default('en');
            $table->string('calendartype')->nullable()->default('gregorian');
            $table->string('theme')->nullable()->default('');
            $table->string('timezone')->nullable()->default('99');
            $table->biginteger('firstaccess')->nullable()->default(0);
            $table->biginteger('lastaccess')->nullable()->default(0);
            $table->biginteger('lastlogin')->nullable()->default(0);
            $table->biginteger('currentlogin')->nullable()->default(0);
            $table->string('lastip')->nullable()->default('');
            $table->string('secret')->nullable()->default('');
            $table->biginteger('picture')->nullable()->default(null);
            $table->string('url')->nullable()->default('');
            $table->longText('description')->nullable()->default(null);
            $table->integer('descriptionformat')->nullable()->default(1);
            $table->boolean('mailformat')->nullable()->default(1);
            $table->boolean('maildigest')->nullable()->default(0);
            $table->integer('maildisplay')->nullable()->default(2);
            $table->boolean('autosubscribe')->nullable()->default(1);
            $table->boolean('trackforums')->nullable()->default(0);
            $table->biginteger('timecreated')->nullable()->default(0);
            $table->biginteger('timemodified')->nullable()->default(0);
            $table->biginteger('trustbitmask')->nullable()->default(0);
            $table->string('imagealt')->nullable()->default(null);
            $table->string('lastnamephonetic')->nullable()->default(null);
            $table->string('firstnamephonetic')->nullable()->default(null);
            $table->string('middlename')->nullable()->default(null);
            $table->string('alternatename')->nullable()->default(null);
            $table->string('business')->nullable()->default('');
            // $table->string('zip_code')->nullable()->default(null);
            // $table->string('state')->nullable()->default(null);
            $table->string('come_from')->nullable()->default('');
            $table->integer('inst')->nullable()->default(0);
            $table->string('inst_sum')->nullable()->default('0');
            $table->integer('inst_num')->nullable()->default(null);
            $table->integer('opt_in')->nullable()->default(null);
            $table->integer('unsubscribed')->nullable()->default(null);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

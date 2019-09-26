<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_email')->unique()->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('user_password');
            $table->integer('user_role');
            $table->integer('user_company_id');
            // $table->integer('rider_id');
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

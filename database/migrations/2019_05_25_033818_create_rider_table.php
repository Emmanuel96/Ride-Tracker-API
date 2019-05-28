<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider', function (Blueprint $table) {
            $table->bigIncrements('rider_id');
            $table->string('rider_password'); 
            $table->string('rider_first_name'); 
            $table->string('rider_last_name'); 
            $table->string('rider_user_name'); 
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
        Schema::dropIfExists('rider');
    }
}

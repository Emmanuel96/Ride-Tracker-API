<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pick_up_location'); 
            $table->string('delivery_location');
            /** 
             * Delivery status values 
             *  0 - still not picked
             * -1 - on it's way 
             *  1 - Delivered
             */ 
            $table->integer('delivery_status'); 
            $table->integer('rider_id'); 
            $table->timestamps();
        });
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
}

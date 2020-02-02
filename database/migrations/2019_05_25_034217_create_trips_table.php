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
            $table->bigIncrements('trip_id');
            $table->string('pick_up_location');
            $table->string('delivery_location');
            /**
             * Delivery status values
             *  0 - still not picked
             * -1 - on it's way
             *  1 - Delivered
             */
            $table->integer('delivery_status')->default('-1');
            $table->dateTime('pickup_date_time');
            $table->string('delivery_time')->nullable();
            $table->string('delivery_phone_number')->nullable();
            $table->string('pickup_phone_number')->nullable();
            $table->integer('trip_rider_id');
            $table->integer('trip_company_id');
            $table->timestamps();
        });
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function down()
    {
        Schema::drop('trips');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
}

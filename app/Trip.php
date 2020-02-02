<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = "trips";
    protected $primaryKey = "trip_id";

    public $fillable = [
        'pickup_date_time',
        'pick_up_location',
        'delivery_location',
        'delivery_phone_number',
        'pickup_phone_number',
        'delivery_time',
        'delivery_status',
        'trip_rider_id',
        'trip_company_id'
    ];
}

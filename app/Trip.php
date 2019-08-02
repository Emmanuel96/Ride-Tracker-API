<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = "trips";
    protected $primary_key = "id";
    
    public $fillable=[
        'pickup_time',
        'pick_up_location', 
        'delivery_location', 
        'delivery_time',
        'delivery_status',
        'rider_id'
    ];
    
}
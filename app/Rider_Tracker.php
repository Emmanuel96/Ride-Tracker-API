<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider_Tracker extends Model
{
    protected $table = "rider"; 
    public $fillable = [
        'rider_first_name', 
        'rider_last_name', 
        'rider_user_name', 
    ]; 
}

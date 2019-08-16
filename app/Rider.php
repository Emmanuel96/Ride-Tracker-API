<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $primarykey = "rider_id"; 
    protected $table = "rider"; 
    protected $fillable = [
        'rider_name', 
        'rider_password', 
        'rider_first_name', 
        'rider_user_name', 
    ]; 
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $primarykey = "rider_id";
    protected $table = "rider";
    protected $fillable = [
        'rider_user_id',
    ];
}

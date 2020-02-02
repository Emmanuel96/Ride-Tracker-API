<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company";

    protected $primaryKey = "company_id";

    protected $fillable =
    [
        'company_name', 'company_address', 'company_status'
    ];
}

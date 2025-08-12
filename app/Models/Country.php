<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'country_name',
        'country_code',
        'iso_code',
        'phone_code',
        'currency_code',
        'currency_name',
        'continent'
    ];
}

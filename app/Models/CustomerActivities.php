<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasUlids;


class CustomerActivities extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'customer_acivities' ;


    protected $fillable = [
        'user_id',
        'current_login',
        'last_login',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;


class UserPassbook extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'users_passbooks' ;



    protected $fillable = [
            'user_id',
            'trans_id',
            'trans_date',
            'reference',
            'description',
            'trans_type',
            'amount',
            'status',
    ];

    
}

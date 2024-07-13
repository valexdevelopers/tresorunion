<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartialTransfer extends Model
{
    use HasFactory;

    protected $table = 'partial_transfers' ;



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

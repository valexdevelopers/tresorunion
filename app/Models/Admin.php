<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasUlids;

    protected $table = 'admins';

    //mass assignable properties

    protected $fillable = [
        'username',
        'email',
        'password',
        'link',  
        'status',
    ];



     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    // properties that should be cast

    protected $cast = [
        'password' => 'hashed',   
     ];
}

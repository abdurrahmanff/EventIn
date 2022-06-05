<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'role_id', 
        'email', 
        'password', 
        'phone_num', 
        'birth'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];
    
}

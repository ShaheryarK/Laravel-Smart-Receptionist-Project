<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{   use Notifiable;
    protected $fillable = [
        'firstname', 'lastname','email','password','phonenumber','gender','DOB'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected  $guard = 'managers';
}

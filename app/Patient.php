<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Patient extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'firstname', 'lastname','email','password','phonenumber','gender','DOB'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected  $guard = 'patients';

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }
}

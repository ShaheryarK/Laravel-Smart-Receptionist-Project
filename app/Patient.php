<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Patient extends Authenticatable implements JWTSubject
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


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

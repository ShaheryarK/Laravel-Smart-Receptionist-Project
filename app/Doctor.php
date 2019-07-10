<?php

namespace App;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable ;

class Doctor extends  Authenticatable implements JWTSubject
{   use Notifiable;
    protected $fillable = ['firstname', 'lastname','email','password','phonenumber','gender','DOB','department_id',];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected  $guard = 'doctors';
    public function consultancy()
    {
        return $this->hasMany('App\Consultancy');
    }


    public function appointmentslots()
    {
        return $this->hasManyThrough('App\AppointmentSlot','App\Timeslot','doctor_id','timeslot_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function timeslot()
    {
        return $this->hasMany('App\Timeslot');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointments');
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

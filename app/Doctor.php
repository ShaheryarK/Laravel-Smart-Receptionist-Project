<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends  Authenticatable
{   use Notifiable;
    protected $fillable = ['firstname', 'lastname','email','password','phonenumber','gender','DOB','department_id'];

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
}

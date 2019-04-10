<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected  $fillable = ['start time','stop time'];

    public function doctor()
    {
        return $this->belongsTo('App\doctor');
    }

    public function appointmentslot()
    {
        return $this->hasMany('App\AppointmentSlot');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected  $fillable = ['start_time','end_time','doctor_id','status'];

    public function doctor()
    {
        return $this->belongsTo('App\doctor');
    }

    public function appointmentslot()
    {
        return $this->hasMany('App\AppointmentSlot');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentSlot extends Model
{

    protected  $fillable = ['booking_status','start_time','timeslot_id'];

    public function appointment()
    {
        return $this->hasOne('App\Appointment');
    }

    public function timeslot()
    {
        return $this->belongsTo('App\Timeslot');
    }
}

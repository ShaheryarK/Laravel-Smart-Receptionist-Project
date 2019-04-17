<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected  $fillable = ['patient_id','doctor_id','appointmentslot_id','started time','end time'];

    public function feedback()
    {
        return $this->hasOne('App\Feedback');
    }

    public function appointmentslot()
    {
        return $this->belongsTo('App\AppointmentSlot');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}

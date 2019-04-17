<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultancy extends Model
{
    protected  $fillable = ['start time','stop time'];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function timeslot()
    {
        return $this->belongsTo('App\Timeslot');
    }
}

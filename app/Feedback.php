<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected  $fillable = ['rating','comment'];

    public function appointment()
    {
        return $this->belongsTo('App\Appointment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

}

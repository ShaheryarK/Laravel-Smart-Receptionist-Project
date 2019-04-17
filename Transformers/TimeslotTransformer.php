<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 4/12/2019
 * Time: 10:41 AM
 */

class TimeslotTransformer extends  Transformer
{
    public  function  transform($timeslot)
    {
        return ['timeslot_id' => $timeslot['id'] ,'starttime'=> date('h:i:s', strtotime($timeslot["start_time"])), 'endtime'=>date('h:i:s', strtotime($timeslot["end_time"])),'startdate'=>date('m-d-Y', strtotime($timeslot["start_time"])),'enddate'=>date('m-d-Y', strtotime($timeslot["end_time"]))];
    }
}
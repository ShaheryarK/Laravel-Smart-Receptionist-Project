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
        return ['Timeslot ID' => $timeslot['id'],'Start Time'=>date('h:i A', strtotime($timeslot["start_time"])), 'End Time'=>date('h:i A', strtotime($timeslot["end_time"])),'Start Date'=>date('d-m-Y', strtotime($timeslot["start_time"])),'End Date'=>date('d-m-Y', strtotime($timeslot["end_time"])) ];
    }
}
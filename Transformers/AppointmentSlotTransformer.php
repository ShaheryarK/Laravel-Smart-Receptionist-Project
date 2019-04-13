<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 3/26/2019
 * Time: 11:07 AM
 */

class AppointmentSlotTransformer extends  Transformer
{
     public  function  transform($appointmentslot)
        {
            return ['appointmentslot_id' => $appointmentslot['id'],"status"=>$appointmentslot["booking_status"],'start time'=>date('h:i A', strtotime($appointmentslot["start_time"])),'start date'=>date('d-m-Y', strtotime($appointmentslot["start_time"]))];
    }

}
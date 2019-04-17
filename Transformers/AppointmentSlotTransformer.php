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
            return ['appointmentslot_id' => $appointmentslot['id'],"status"=>$appointmentslot["booking_status"],'starttime'=>date('h:i:s', strtotime($appointmentslot["start_time"])),'startdate'=>date('m-d-Y', strtotime($appointmentslot["start_time"]))];
    }

}
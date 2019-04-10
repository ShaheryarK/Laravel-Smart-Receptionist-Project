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
        if($appointmentslot['Booking status'] =='0')
        return ['appointmentslot_id' => $appointmentslot['id'],'start time'=>$appointmentslot['start time']];
    }
}
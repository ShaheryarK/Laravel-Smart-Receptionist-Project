<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 4/11/2019
 * Time: 7:10 AM
 */

class AppointmentTransformer extends Transformer
{
    public  function  transform($appointment)
    {
            return ['appointment_id' => $appointment['id'], "doctor_id"=> $appointment["doctor_id"],
        "patient_id" =>$appointment["patient_id"],
        "appointmentslot_id"=>$appointment["appointmentslot_id"],
        'endtime'=>date('h:i:s', strtotime($appointment["end_time"])),'enddate'=>date('m-d-Y', strtotime($appointment["end_time"])),
        "status"=>$appointment["status"],];
    }
}
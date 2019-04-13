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
            return ['appointment_id' => $appointment['id'], "doctor id"=> $appointment["doctor_id"],
        "patient id" =>$appointment["patient_id"],
        "appointmentslot ID"=>$appointment["appointmentslot_id"],
        'end time'=>date('h:i:a', strtotime($appointment["end_time"])),'end date'=>date('d-m-Y', strtotime($appointment["end_time"])),
        "status"=>$appointment["status"],];
    }
}
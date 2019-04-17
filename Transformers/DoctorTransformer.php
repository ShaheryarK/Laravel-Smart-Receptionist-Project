<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 3/26/2019
 * Time: 10:26 AM
 */

class DoctorTransformer extends Transformer
{

    public  function  transform($doctor)
    {
        return ['doctor_id' => $doctor['id'],'firstname'=>$doctor['firstname'], 'lastname' =>$doctor['lastname']];
    }
}
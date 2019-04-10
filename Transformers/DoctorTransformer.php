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
        return ['Doctor id' => $doctor['id'],'First Name'=>$doctor['firstname'], 'Last Name' =>$doctor['lastname']];
    }
}
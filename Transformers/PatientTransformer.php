<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 4/11/2019
 * Time: 6:58 AM
 */

class PatientTransformer extends Transformer
{

    public  function  transform($patient)
    {
        return ['Patient id' => $patient['id'],'First Name'=>$patient['firstname'], 'Last Name' =>$patient['lastname']];
    }
}

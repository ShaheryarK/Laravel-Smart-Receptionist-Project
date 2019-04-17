<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 3/24/2019
 * Time: 6:18 PM
 */
 class TimetableTransformer extends Transformer
{


    public  function  transform($timetable)
    {
        return ['doctor_id' => $timetable['doctor_id'],'timetable'=>$timetable['id']];
    }
}
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
        return ['Doctor id' => $timetable['doctor_id'],'Timetable'=>$timetable['id']];
    }
}
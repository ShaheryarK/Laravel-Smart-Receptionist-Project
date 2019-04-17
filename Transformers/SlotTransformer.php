<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 4/13/2019
 * Time: 5:25 AM
 */

class SlotTransformer extends Transformer
{
    public function transform($slot)
    {
        // TODO: Implement transform() method.
            if($slot["booking_status"]== 0)

        return ['appointmentslot_id' => $slot['id'],"status"=>$slot["booking_status"],'starttime'=>date('h:i:s', strtotime($slot["start_time"])),'startdate'=>date('m-d-Y', strtotime($slot["start_time"]))];

    }

}
<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 4/13/2019
 * Time: 3:45 AM
 */

 class FeedbackTransformer extends Transformer
{
    public  function  transform($feedback)
    {
        return ['id' => $feedback['id'],'Rating'=>$feedback['rating'], 'comments' =>$feedback['comment']];
    }
}
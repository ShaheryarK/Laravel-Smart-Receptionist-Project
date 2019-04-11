<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 4/11/2019
 * Time: 8:01 AM
 */

class DepartmentTransformer extends Transformer
{
    public  function  transform($department)
    {
        return ['Department id' => $department['id'],'Department Name'=>$department['name'], 'Description' => $department['description']];
    }
}
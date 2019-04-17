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
        return ['department_id' => $department['id'],'department_name'=>$department['name'], 'description' => $department['description']];
    }
}
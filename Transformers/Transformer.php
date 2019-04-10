<?php
/**
 * Created by PhpStorm.
 * User: STAK
 * Date: 3/24/2019
 * Time: 6:15 PM
 */

abstract class Transformer
{

    public function transformCollection(array $item)
    {
        return array_map([$this,'transform'],$item);
    }

    public abstract  function  transform($item);
}
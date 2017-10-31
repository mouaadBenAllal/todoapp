<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 30/09/2017
 * Time: 23:50
 */

class Fix
{
    public function dd($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        die();
    }
}
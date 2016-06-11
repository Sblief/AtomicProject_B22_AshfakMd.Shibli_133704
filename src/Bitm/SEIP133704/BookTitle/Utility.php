<?php
/**
 * Created by PhpStorm.
 * User: Ashfak Md. Shibli
 * Date: 11-06-16
 * Time: PM 01.23
 */

namespace App\Bitm\SEIP133704\BookTitle;


class Utility
{
    public static function d($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
    public static function dd($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }
    public static function redirect($data){
        header('Location:'.$data);
    }
    

}
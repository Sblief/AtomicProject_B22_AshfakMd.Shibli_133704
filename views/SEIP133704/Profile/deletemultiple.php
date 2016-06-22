<?php
/**
 * Created by PhpStorm.
 * User: Ashfak Md. Shibli
 * Date: 15-06-16
 * Time: AM 11.24
 */
    include_once ('../../../vendor/autoload.php');
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;

    $deleteMultiple = new Picture();
    $deleteMultiple->deleteSelected($_POST['mark']);







?>
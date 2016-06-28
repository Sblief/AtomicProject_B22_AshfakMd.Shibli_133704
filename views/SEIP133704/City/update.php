<?php
var_dump($_POST);
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

$selected_city= $_POST['city'];
$comm_separated=implode(",",$selected_city);
$_POST['city']=$comm_separated;

        $upadate= new City();
        $upadate->prepare($_POST);
        $upadate->update();
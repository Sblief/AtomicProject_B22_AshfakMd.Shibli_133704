<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

$store = new City();
$store->prepare($_POST);
$store->store();


?>

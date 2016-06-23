<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\DateOfBirth\Birthday;
use App\Bitm\SEIP133704\DateOfBirth\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;


$email = new Birthday();
$email->prepare($_POST);
$email->store();


?>

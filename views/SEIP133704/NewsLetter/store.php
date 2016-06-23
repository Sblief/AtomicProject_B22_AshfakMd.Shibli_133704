<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;
use App\Bitm\SEIP133704\GlobalClasses\Utility;


$store = new Email();
$store->prepare($_POST);
$store->store();


?>

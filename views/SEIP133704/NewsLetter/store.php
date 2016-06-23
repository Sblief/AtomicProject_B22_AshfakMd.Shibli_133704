<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;
use App\Bitm\SEIP133704\GlobalClasses\Utility;


$email = new Email();
$email->prepare($_POST);
$email->store();


?>

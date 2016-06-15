<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

//Utility::redirect("index.php");



//$store = new Book();
//echo $store->store();

$email = new Email();
$email->prepare($_POST);
$email->store();

//var_dump($_POST);

?>

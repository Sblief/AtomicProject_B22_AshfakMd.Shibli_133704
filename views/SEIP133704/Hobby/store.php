<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Hobby\Hobby;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\Hobby\Uses;

//$store = new Hobby();
//echo $store->store();

$selected_hobby= $_POST['hobby'];
$comm_separated=implode(",",$selected_hobby);
$_POST['hobby']=$comm_separated;

$hobbyNew = new Hobby();
$hobbyNew->prepare($_POST);
$hobbyNew->store();


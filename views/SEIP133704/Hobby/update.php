<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Hobby\Hobby;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
  //Utility::dd($_POST);


$selected_hobby= $_POST['hobby'];
$comm_separated=implode(",",$selected_hobby);
$_POST['hobby']=$comm_separated;

$hobbyNew = new Hobby();
$hobbyNew->prepare($_POST);
$hobbyNew->prepare($_GET);

$hobbyNew->update();
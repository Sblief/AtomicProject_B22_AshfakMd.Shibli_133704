<?php
session_start();
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Hobby\Hobby;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\Hobby\Uses;

$newIndex = new Book();
$itemPerPage = $_SESSION['itemPerPage'];
$totalItem = $newIndex->count();
$totalPage = ceil($totalItem/$itemPerPage);
$totalPageAfterInsert = ceil(($totalItem+1)/$itemPerPage);
if($totalPageAfterInsert>$totalPage){
    $_SESSION['totalPage'] = $totalPageAfterInsert;
}
else $_SESSION['totalPage'] = $totalPage;

$selected_hobby= $_POST['hobby'];
$comm_separated=implode(",",$selected_hobby);
$_POST['hobby']=$comm_separated;

$hobbyNew = new Hobby();
$hobbyNew->prepare($_POST);
$hobbyNew->store();


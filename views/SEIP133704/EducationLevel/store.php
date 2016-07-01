<?php
session_start();
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;
use App\Bitm\SEIP133704\EducationLevel\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

$newIndex = new Book();
$itemPerPage = $_SESSION['itemPerPage'];
$totalItem = $newIndex->count();
$totalPage = ceil($totalItem/$itemPerPage);
$totalPageAfterInsert = ceil(($totalItem+1)/$itemPerPage);
if($totalPageAfterInsert>$totalPage){
    $_SESSION['totalPage'] = $totalPageAfterInsert;
}
else $_SESSION['totalPage'] = $totalPage;

$store = new Education();
$store->prepare($_POST);
$store->store();


?>

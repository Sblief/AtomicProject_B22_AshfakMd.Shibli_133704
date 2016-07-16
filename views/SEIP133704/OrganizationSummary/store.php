<?php
session_start();
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\OrganizationSummary\Summary;
use App\Bitm\SEIP133704\OrganizationSummary\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

$newIndex = new Summary();
$itemPerPage = $_SESSION['itemPerPage'];
$totalItem = $newIndex->count();
$totalPage = ceil($totalItem/$itemPerPage);
$totalPageAfterInsert = ceil(($totalItem+1)/$itemPerPage);
if($totalPageAfterInsert>$totalPage){
    $_SESSION['totalPage'] = $totalPageAfterInsert;
}
else $_SESSION['totalPage'] = $totalPage;

$store = new Summary();
$store->prepare($_POST);
$store->store();


?>

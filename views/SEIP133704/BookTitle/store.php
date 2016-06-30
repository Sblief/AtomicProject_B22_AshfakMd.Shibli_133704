<?php
session_start();
include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
use App\Bitm\SEIP133704\BookTitle\Book;
use App\Bitm\SEIP133704\GlobalClasses\Utility; //Called the class files used here.

$newIndex = new Book();
$itemPerPage = $_SESSION['itemPerPage'];
$totalItem = $newIndex->count();
$totalPage = ceil($totalItem/$itemPerPage);
$totalPageAfterInsert = ceil(($totalItem+1)/$itemPerPage);
if($totalPageAfterInsert>$totalPage){
    $_SESSION['totalPage'] = $totalPageAfterInsert;
}
else $_SESSION['totalPage'] = $totalPage;


$store = new Book(); // Made an object of class
$store->prepare($_POST); // called prepare method of the class to prepare what in the argument
$store->store();  //store data in database

?>

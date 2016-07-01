<?php
session_start();
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
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

if((isset($_FILES['image'])&& !empty($_FILES['image']['name']))){
    $imageName= time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];

    move_uploaded_file( $temporaryLocation,'../../../resource/images/'.$imageName);
    $_POST['image']=$imageName;

}

$profilePicture= new Picture();
$profilePicture->prepare($_POST)->store();

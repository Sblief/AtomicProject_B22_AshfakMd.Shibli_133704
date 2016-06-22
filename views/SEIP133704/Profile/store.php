<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;



if((isset($_FILES['image'])&& !empty($_FILES['image']['name']))){
    $imageName= time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];

    move_uploaded_file( $temporaryLocation,'../../../resource/images/'.$imageName);
    $_POST['image']=$imageName;

}

$profilePicture= new Picture();
$profilePicture->prepare($_POST)->store();

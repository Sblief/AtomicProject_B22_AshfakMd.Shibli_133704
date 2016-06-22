<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;


if((isset($_FILES['image'])&& !empty($_FILES['image']['name']))){
    $image_name= time().$_FILES['image']['name'];
    $temporary_location= $_FILES['image']['tmp_name'];

    move_uploaded_file( $temporary_location,'../../../resource/images'.$image_name);
    $_POST['image']=$image_name;

}

$profile_picture= new Picture();
$profile_picture->prepare($_POST)->store();

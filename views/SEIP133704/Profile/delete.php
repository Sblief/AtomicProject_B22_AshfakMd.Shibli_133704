<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;

   $profilePicture = new Picture();
    $singleInfo = $profilePicture->prepare($_GET)->view();
unlink($_SERVER['DOCUMENT_ROOT'].'/AtomicProject_B22_AshfakMd.Shibli_133704/resource/images/'.$singleInfo->images);
$profilePicture->prepare($_GET)->delete();
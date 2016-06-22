<?php
    include_once ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
   

    $recoverPicture = new Picture();
    $recoverPicture->prepare($_GET)->recover();
   
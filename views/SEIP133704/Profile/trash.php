<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
  

    $trashProfile =  new Picture();
    $trashProfile->prepare($_GET)->trash();
    

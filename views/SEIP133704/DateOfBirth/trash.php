<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\DateOfBirth\Birthday;
use App\Bitm\SEIP133704\DateOfBirth\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
  

    $trashEmail =  new Birthday();
    $trashEmail->prepare($_GET);
    $trashEmail->trash();
    

<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\DateOfBirth\Birthday;
use App\Bitm\SEIP133704\DateOfBirth\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
  

    $trash =  new Birthday();
    $trash->prepare($_GET);
    $trash->trash();
    

<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
  

    $trash =  new City();
    $trash->prepare($_GET);
    $trash->trash();
    

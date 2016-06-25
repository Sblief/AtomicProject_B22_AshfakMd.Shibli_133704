<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\EducationLevel\Education;
use App\Bitm\SEIP133704\EducationLevel\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
  

    $trash =  new Education();
    $trash->prepare($_GET);
    $trash->trash();
    

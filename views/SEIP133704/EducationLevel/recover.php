<?php
    include_once ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\EducationLevel\Education;
use App\Bitm\SEIP133704\EducationLevel\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
   

    $recover = new Education();
    $recover->prepare($_GET);
    $recover->recover();
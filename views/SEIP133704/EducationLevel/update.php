<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;
use App\Bitm\SEIP133704\EducationLevel\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

        $upadate= new Education();
        $upadate->prepare($_POST);
        $upadate->update();
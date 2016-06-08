<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;

    $update = new Education();
    echo $update->update();
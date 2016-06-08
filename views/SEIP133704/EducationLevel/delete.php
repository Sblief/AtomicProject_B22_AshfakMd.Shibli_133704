<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;

    $delete = new Education();
    echo $delete->delete();
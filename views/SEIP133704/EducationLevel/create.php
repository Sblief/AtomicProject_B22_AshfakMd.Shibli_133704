<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\EducationLevel\Education;

    $create = new Education();
    echo $create->create();


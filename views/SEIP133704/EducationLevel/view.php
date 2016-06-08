<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;

    $view= new Education();
    echo $view->view();
<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\DateOfBirthday\Birthday;

    $view= new Birthday();
    echo $view->view();
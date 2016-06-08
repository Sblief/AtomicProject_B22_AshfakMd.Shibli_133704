<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\City\City;

    $view= new City();
    echo $view->view();
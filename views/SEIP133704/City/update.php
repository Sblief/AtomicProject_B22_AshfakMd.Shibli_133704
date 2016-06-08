<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\City\City;

    $update = new City();
    echo $update->update();
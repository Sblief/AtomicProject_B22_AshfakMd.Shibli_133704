<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\City\City;

    $index = new City();
    echo $index->index();
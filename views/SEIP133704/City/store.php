<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\City\City;
    
    $store = new City();
    echo $store->store();
<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\City\City;
    $delete = new City();
    echo $delete->delete();
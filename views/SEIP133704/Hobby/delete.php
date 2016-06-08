<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Hobby\Hobby;

    $delete = new Hobby();
    echo $delete->delete();
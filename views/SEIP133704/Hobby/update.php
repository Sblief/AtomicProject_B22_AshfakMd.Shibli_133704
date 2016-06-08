<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Hobby\Hobby;

    $update = new Hobby();
    echo $update->update();
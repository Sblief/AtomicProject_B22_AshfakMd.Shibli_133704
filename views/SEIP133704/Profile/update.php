<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;

    $update = new Picture();
    echo $update->update();
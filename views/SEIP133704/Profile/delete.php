<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;

    $delete = new Picture();
    echo $delete->delete();
<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\DateOfBirthday\Birthday;

    $update = new Birthday();
    echo $update->update();
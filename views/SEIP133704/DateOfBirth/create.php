<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\DateOfBirthday\Birthday;

    $create = new Birthday();
    echo $create->create();


<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\DateOfBirthday\Birthday;

    $delete = new Birthday();
    echo $delete->delete();
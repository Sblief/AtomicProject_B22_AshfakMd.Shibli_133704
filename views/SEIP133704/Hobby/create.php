<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\Hobby\Hobby;

    $create = new Hobby();
    echo $create->create();


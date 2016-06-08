<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\Profile\Picture;

    $create = new Picture();
    echo $create->create();


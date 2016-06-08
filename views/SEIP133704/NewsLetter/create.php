<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\NewsLetter\Email;

    $create = new Email();
    echo $create->create();


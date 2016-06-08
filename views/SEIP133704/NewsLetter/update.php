<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;

    $update = new Email();
    echo $update->update();
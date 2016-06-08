<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;

    $delete = new Email();
    echo $delete->delete();
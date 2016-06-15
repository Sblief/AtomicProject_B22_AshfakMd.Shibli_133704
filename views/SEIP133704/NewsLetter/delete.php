<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\NewsLetter\Email;

    $emailDelete = new Email();
    $emailDelete->prepare($_GET);
    $emailDelete->delete();
<?php
var_dump($_POST);
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\NewsLetter\Email;

        $upadate= new Email();
        $upadate->prepare($_POST);
        $upadate->update();
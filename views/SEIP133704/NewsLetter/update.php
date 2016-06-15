<?php
var_dump($_POST);
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\NewsLetter\Email;

        $email= new Email();
        $email->prepare($_POST);
        $email->update();
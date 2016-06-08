<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;

    $view= new Email();
    echo $view->view();
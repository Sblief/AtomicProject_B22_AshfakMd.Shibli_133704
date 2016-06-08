<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\TermsAndCondition\Terms;

    $view= new Terms();
    echo $view->view();
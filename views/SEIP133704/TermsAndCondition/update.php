<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\TermsAndCondition\Terms;

    $update = new Terms();
    echo $update->update();
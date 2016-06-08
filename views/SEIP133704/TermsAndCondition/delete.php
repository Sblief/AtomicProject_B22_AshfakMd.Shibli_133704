<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\TermsAndCondition\Terms;

    $delete = new Terms();
    echo $delete->delete();
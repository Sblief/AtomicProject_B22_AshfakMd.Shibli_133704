<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\TermsAndCondition\Terms;

    $create = new Terms();
    echo $create->create();


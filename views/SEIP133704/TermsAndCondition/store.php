<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\TermsAndCondition\Terms;

$store = new Terms();
echo $store->store();
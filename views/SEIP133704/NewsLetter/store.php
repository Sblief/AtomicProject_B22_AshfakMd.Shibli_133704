<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;

$store = new Email();
echo $store->store();
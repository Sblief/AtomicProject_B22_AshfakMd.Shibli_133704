<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\DateOfBirthday\Birthday;

$store = new Birthday();
echo $store->store();
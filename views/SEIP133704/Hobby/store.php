<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Hobby\Hobby;

$store = new Hobby();
echo $store->store();
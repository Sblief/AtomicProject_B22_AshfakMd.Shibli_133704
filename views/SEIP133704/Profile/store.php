<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;

$store = new Picture();
echo $store->store();
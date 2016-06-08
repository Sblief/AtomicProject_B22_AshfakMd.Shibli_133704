<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\OrganizationSummary\Summary;

$store = new Summary();
echo $store->store();
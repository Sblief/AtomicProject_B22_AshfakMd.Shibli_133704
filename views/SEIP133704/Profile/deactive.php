<?php
include_once ("../../../vendor/autoload.php");

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

$newActive = new Picture();
$newActive->prepare($_GET);
$newActive->deactive();
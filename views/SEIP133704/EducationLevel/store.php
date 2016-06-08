<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;

$store = new Education();
echo $store->store();
<?php
    include_once ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\OrganizationSummary\Summary;
use App\Bitm\SEIP133704\OrganizationSummary\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;
   

    $recover= new Summary();
    $recover->prepare($_GET);
    $recover->recover();
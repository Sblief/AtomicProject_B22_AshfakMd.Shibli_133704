<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\OrganizationSummary\Summary;
use App\Bitm\SEIP133704\OrganizationSummary\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;
  

    $trash =  new Summary();
    $trash->prepare($_GET);
    $trash->trash();
    

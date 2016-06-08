<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\OrganizationSummary\Summary;

    $delete = new Summary();
    echo $delete->delete();
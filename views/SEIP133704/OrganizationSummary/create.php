<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\OrganizationSummary\Summary;

    $create = new Summary();
    echo $create->create();


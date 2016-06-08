<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\OrganizationSummary\Summary;

    $view= new Summary();
    echo $view->view();
<?php
    include_once ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;

    $recoverMultiple = new Picture();
    $recoverMultiple->recoverSelected($_POST['mark']);
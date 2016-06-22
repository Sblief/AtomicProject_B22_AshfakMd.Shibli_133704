<?php
    include_once ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
   

    $recoverBook = new Book();
    $recoverBook->prepare($_GET);
    $recoverBook->recover();
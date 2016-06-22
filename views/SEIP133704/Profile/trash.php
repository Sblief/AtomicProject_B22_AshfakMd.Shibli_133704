<?php
    include ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
  

    $trashBook =  new Book();
    $trashBook->prepare($_GET);
    $trashBook->trash();
    

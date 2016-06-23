<?php
    include_once ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\NewsLetter\Email;
   

    $recover = new Email();
    $recover->prepare($_GET);
    $recover->recover();
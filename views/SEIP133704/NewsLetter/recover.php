<?php
    include_once ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\NewsLetter\Email;
   

    $recoverEmail = new Email();
    $recoverEmail->prepare($_GET);
    $recoverEmail->recover();
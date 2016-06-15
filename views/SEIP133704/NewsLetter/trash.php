<?php
    include ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\NewsLetter\Email;
  

    $trashEmail =  new Email();
    $trashEmail->prepare($_GET);
    $trashEmail->trash();
    

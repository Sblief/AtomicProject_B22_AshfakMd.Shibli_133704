<?php
    include ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\NewsLetter\Email;
  

    $trash =  new Email();
    $trash->prepare($_GET);
    $trash->trash();
    

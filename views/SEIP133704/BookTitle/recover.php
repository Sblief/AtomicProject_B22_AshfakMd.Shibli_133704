<?php
    include_once ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\BookTitle\Book;
   

    $recoverBook = new Book();
    $recoverBook->prepare($_GET);
    $recoverBook->recover();
<?php
    include_once ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\BookTitle\Utility;
    use App\Bitm\SEIP133704\BookTitle\Message;

    $recoverBook = new Book();
    $recoverBook->prepare($_GET);
    $recoverBook->recover();
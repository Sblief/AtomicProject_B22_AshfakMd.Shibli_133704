<?php
    include ('../../../vendor/autoload.php');
    
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\BookTitle\Utility;
    use App\Bitm\SEIP133704\BookTitle\Message;

    $trashBook =  new Book();
    $trashBook->prepare($_GET);
    $trashBook->trash();
    

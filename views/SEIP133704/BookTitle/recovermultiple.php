<?php
    include_once ('../../../vendor/autoload.php');

    use App\Bitm\SEIP133704\BookTitle\Book;

    $recoverMultiple = new Book();
    $recoverMultiple->recoverSelected($_POST['mark']);
<?php
var_dump($_POST);
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\BookTitle\Book;

        $book= new Book();
        $book->prepare($_POST);
        $book->update();
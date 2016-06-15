<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\BookTitle\Book;

    $bookDelete = new Book();
    $bookDelete->prepare($_GET);
    $bookDelete->delete();
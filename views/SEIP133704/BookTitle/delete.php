<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\BookTitle\Book;

    $delete = new Book();
    echo $delete->delete();
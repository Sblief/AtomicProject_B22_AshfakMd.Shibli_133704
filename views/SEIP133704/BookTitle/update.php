<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\BookTitle\Book;

    $update = new Book();
    echo $update->update();
<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\BookTitle\Book;

    $edit = new Book();
    echo $edit->edit();
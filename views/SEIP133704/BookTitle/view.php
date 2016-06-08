<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\BookTitle\Book;

    $view= new Book();
    echo $view->view();
<?php
/**
 * Created by PhpStorm.
 * User: Ashfak Md. Shibli
 * Date: 15-06-16
 * Time: AM 11.24
 */
    include_once ('../../../vendor/autoload.php');
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\BookTitle\Utility;

    $deleteMultiple = new Book();
    $deleteMultiple->deleteSelected($_POST['mark']);







?>
<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\BookTitle\Book;

//$store = new Book();
//echo $store->store();

$book = new Book();
$book->prepare($_POST);
$book->store();

var_dump($_POST);

?>

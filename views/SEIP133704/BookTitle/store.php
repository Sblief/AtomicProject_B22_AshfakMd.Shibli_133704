<?php
include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
use App\Bitm\SEIP133704\BookTitle\Book;
use App\Bitm\SEIP133704\GlobalClasses\Utility; //Called the class files used here.


$store = new Book(); // Made an object of class
$store->prepare($_POST); // called prepare method of the class to prepare what in the argument
$store->store();  //store data in database


?>

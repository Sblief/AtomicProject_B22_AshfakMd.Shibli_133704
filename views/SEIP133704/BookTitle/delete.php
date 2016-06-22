<?php 
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    use App\Bitm\SEIP133704\BookTitle\Book;        //Called the class files used here.

    $delete = new Book();     // Made an object of class
    $delete->prepare($_GET);   // called prepare method of the class to prepare what in the argument
    $delete->delete();         // Delete data from the database
?>
<?php
    include_once ('../../../vendor/autoload.php'); //Autoload file included to recognize namespace
    
    use App\Bitm\SEIP133704\BookTitle\Book; //Called the class files used here.
   

    $recover = new Book();    // Made an object of class
    $recover->prepare($_GET); // called prepare method of the class to prepare what in the argument
    $recover->recover(); // Recovers data
<?php
    include ('../../../vendor/autoload.php'); //Autoload file included to recognize namespace
    
    use App\Bitm\SEIP133704\BookTitle\Book; //Called the class files used here.
  

    $trash =  new Book(); // Made an object of class
    $trash->prepare($_GET); // called prepare method of the class to prepare what in the argument
    $trash->trash(); //Data trashed in database
    

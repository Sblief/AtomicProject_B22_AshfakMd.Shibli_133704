<?php
var_dump($_POST);
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    use App\Bitm\SEIP133704\BookTitle\Book; //Called the class files used here.

        $update= new Book(); // Made an object of class
        $update->prepare($_POST); // called prepare method of the class to prepare what in the argument
        $update->update(); //data updated in the database

?>
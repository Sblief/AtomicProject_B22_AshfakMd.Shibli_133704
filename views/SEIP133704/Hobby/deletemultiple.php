<?php

    include_once ('../../../vendor/autoload.php'); //Autoload file included to recognize namespace
    use App\Bitm\SEIP133704\Hobby\Hobby;  //Called the class files used here.

    $deleteMultiple = new Hobby();    // Made an object of class
    $deleteMultiple->deleteSelected($_POST['mark']);   // called prepare method of the class to prepare what in the argument 


?>
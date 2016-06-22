<?php
    include_once ('../../../vendor/autoload.php'); //Autoload file included to recognize namespace

    use App\Bitm\SEIP133704\Hobby\Hobby; //Called the class files used here.

    $recoverMultiple = new Hobby(); // Made an object of class
    $recoverMultiple->recoverSelected($_POST['mark']); // To recover multiple data. marked ids are sent as argument.
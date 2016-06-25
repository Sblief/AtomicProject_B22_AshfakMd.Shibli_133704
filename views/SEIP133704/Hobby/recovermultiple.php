<?php
    include_once ('../../../vendor/autoload.php'); //Autoload file included to recognize namespace

    use App\Bitm\SEIP133704\Hobby\Hobby; //Called the class files used here.
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

    $recoverMultiple = new Hobby(); // Made an object of class
if(!empty($_POST['mark']))
    $recoverMultiple->recoverSelected($_POST['mark']); // To recover multiple data. marked ids are sent as argument.
else {
    Utility::redirect('trashed.php');
    Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Ouch!</strong>Please select something to recover.
                        </div>
                        <script>
                            $('#message').show().delay(4000).fadeOut();
                        </script>");
}
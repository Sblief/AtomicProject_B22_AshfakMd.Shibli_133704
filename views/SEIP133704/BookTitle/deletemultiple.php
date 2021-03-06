<?php

    include_once ('../../../vendor/autoload.php'); //Autoload file included to recognize namespace
    use App\Bitm\SEIP133704\BookTitle\Book;  //Called the class files used here.
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;

    $deleteMultiple = new Book();    // Made an object of class
if(!empty($_POST['mark']))
    $deleteMultiple->deleteSelected($_POST['mark']);   // called prepare method of the class to prepare what in the argument
else {
    Utility::redirect('trashed.php');
    Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Ouch!</strong> Please select something to delete.
                        </div>
                        <script>
                            $('#message').show().delay(4000).fadeOut();
                        </script>");
}


?>
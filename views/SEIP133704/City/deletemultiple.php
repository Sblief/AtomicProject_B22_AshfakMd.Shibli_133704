<?php

    include_once ('../../../vendor/autoload.php');
use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

    $deleteMultiple = new City();
if(!empty($_POST['mark']))
    $deleteMultiple->deleteSelected($_POST['mark']);

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
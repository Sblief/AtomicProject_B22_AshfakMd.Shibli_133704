<?php
    include_once ('../../../vendor/autoload.php');

use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

    $recoverMultiple = new Picture();
if(!empty($_POST['mark']))
    $recoverMultiple->recoverSelected($_POST['mark']);
else {
    Utility::redirect('trashed.php');
    Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Ouch!</strong> Please select something to recover.
                        </div>
                        <script>
                            $('#message').show().delay(4000).fadeOut();
                        </script>");
}
<?php

    include_once ('../../../vendor/autoload.php');
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

$newDelete = new Picture();
$list = $newDelete->dataselected($_POST['mark']);
foreach ($list as $item){
    unlink($_SERVER['DOCUMENT_ROOT'].'/AtomicProjectB22_AshfakMd.Shibli_133704/resource/images/'.$item->images);
}
    $deleteMultiple = new Picture();
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
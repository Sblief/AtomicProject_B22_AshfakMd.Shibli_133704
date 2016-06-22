<?php
    include_once ("../../../vendor/autoload.php");
    include ('header.php');
use App\Bitm\SEIP133704\Hobby\Hobby;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;
    $viewHobby = new Hobby();
    $viewHobby->prepare($_GET);
    $singleItem = $viewHobby->view();
    //Utility::dd($singleItem);




//    $view= new Hobby();
//    echo $view->view();
?>
<div class="container">
<table class="table table-bordered " style="margin-top: 100px; margin-bottom: 300px" >
    <caption>
        Single View
    </caption>
    <tr>
        <th>SL</th>
        <th>Hobby List</th>
    </tr>
    <tr>
        <td>
            <?php echo $singleItem['ID'] ?>
        </td>
        <td>
            <?php echo $singleItem['hobby_list'] ?>
        </td>
    </tr>


</table>
</div>

<?php include ('footer.php')?>
<?php
    include_once ("../../../vendor/autoload.php");
    include "header.php";
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    

    $viewBook= new Book();
    $viewBook->prepare($_GET);
    $singleItem = $viewBook->view();
    //Utility::dd($singleItem);
?>
<div class="container" style="margin-bottom: 100px">
    <div class="panel panel-default">
        <div class="panel-body" align="center"></div>
    </div>
    <h2></h2>
    <p></p>
    <div class="container-viewport panel-default">
        <div class="panel-heading">
            <?php Uses::siteKeyword() ?>

        </div>
        <div class="panel-body" style="margin-bottom: 88px">
            <ul class="list-group">
                <li class="list-group-item">ID:   <?php echo $singleItem->ID?></li>
                <li class="list-group-item"><?php Uses::siteKeyword() ?>:   <?php echo $singleItem->bookTitle?></li>
                <li class="list-group-item"> </li>
                <li class="list-group-item"> </li>
            </ul>
        </div>


    </div>
</div>
<?php include "footer.php"?>

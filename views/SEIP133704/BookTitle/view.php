<?php
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\BookTitle\Uses; //Called the class files used here.

 
    $view= new Book();  // Made an object of class
    $view->prepare($_GET); // called prepare method of the class to prepare what in the argument
    $singleItem = $view->view(); //an array object is fetched and assigned in variable.
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
            <?php echo Uses::siteKeyword() ?>

        </div>
        <div class="panel-body" style="margin-bottom: 88px">
            <ul class="list-group">
                <li class="list-group-item">ID:   <?php echo $singleItem->ID?></li>
                <li class="list-group-item"><?php echo Uses::siteKeyword() ?>:   <?php echo $singleItem->bookTitle?></li>
                <li class="list-group-item"> </li>
                <li class="list-group-item"> </li>
            </ul>
        </div>


    </div>
</div>
<?php include "footer.php"?>

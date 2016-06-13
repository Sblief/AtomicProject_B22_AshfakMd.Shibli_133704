<?php
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\BookTitle\Utility;


    $viewBook= new Book();
    $viewBook->prepare($_GET);
    $singleItem = $viewBook->view();
?>
<div class="container" style="margin-bottom: 100px">
    <div class="panel panel-default">
        <div class="panel-body" align="center"></div>
    </div>
    <h2></h2>
    <p></p>
    <div class="container-viewport panel-default">
        <div class="panel-heading">
            Single View

        </div>
        <div class="panel-body" style="margin-bottom: 88px">
            <ul class="list-group">
                <li class="list-group-item">SL   01</li>
                <li class="list-group-item">ID   07</li>
                <li class="list-group-item">PHP Advanced Version 5 </li>
                <li class="list-group-item"> </li>
            </ul>

        </div>


    </div>
</div>
<?php include "footer.php"?>

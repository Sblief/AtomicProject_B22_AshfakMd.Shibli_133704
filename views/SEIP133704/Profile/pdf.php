<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

$newPdf = new Picture();
$allItems = $newPdf->index();

$tableColumn = array("SL","ID","User Name","Thumbnail","","");
$title =  Uses::siteName();
$keyword =  Uses::siteKeyword();


$tableDynamicData = "";
$sl = 0;


foreach ($allItems as $item ):
$sl++;
$tableDynamicData .= "<tr>";
    $tableDynamicData .= "<td>$sl</td>";
    $tableDynamicData .= "<td>$item->id</td>";
    $tableDynamicData .= "<td>$item->name</td>";
    $tableDynamicData .= "<td><img src=\"../../../resource/images/$item->images\" height=\"50px\" width=\"50px\"></td>";
$tableDynamicData .= "</tr>";

endforeach;




$html = <<<ATOMIC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/CustomDesign/css/style.css">
    <script src="../../../resource/jquery/1.12.0/jquery.min.js"></script>
    <script src="../../../resource/bootstrap-3.3.6/js/bootstrap.min.js"></script>

    <title>$title</title>

</head>
<body>
<center><h1>$title</h1></center>
<div>
<h2>$keyword List</h2>
<table class="table table-bordered table-responsive table-hover" >

        <thead>
        <tr>
<!--            table heads are taken from array-->
            <th>$tableColumn[0]</th>
            <th>$tableColumn[1]</th>
            <th>$tableColumn[2]</th>
            <th>$tableColumn[3]</th>
            
        </tr>
        </thead>
        <tbody>
         $tableDynamicData

        </tbody>
    </table>
   
    <footer class="text-center">
            <p>&copy; Copyright Ashfak Md. Shibli & Atomic Projects 2016</p>
    </footer>
    </div>

</body>

</html>


ATOMIC;

require ('../../../vendor/mpdf/mpdf/mpdf.php');

$mpdf = new mPDF();

$mpdf->WriteHTML($html);

if(isset($_GET['pdf']) && $_GET['pdf'] == 'download'){
    $mpdf->Output($title.'.pdf','D');
}

else {
    $title = $title.time();
    $mpdf->Output('../../../resource/pdf/'.$title.'.pdf','F');
    $_SESSION['attach'] = '../../../resource/pdf/'.$title.'.pdf';
    
}



<?php
include_once ("../../../vendor/autoload.php");
include "header.php";
use App\Bitm\SEIP133704\EducationLevel\Education;
use App\Bitm\SEIP133704\EducationLevel\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

$search = $_GET['search'];
$newSearch =  new Education();
$newSearch->prepare($_GET);
$list = $newSearch->index();

$tableColumn = array("SL","ID","Name","Highest Education Level","Action","","");


$filter = "";
if(isset($_GET["nameFilter"])) {
    $filter .= "filtering " ."'". $tableColumn[2]."'";
    if (isset($_GET["resourceFilter"])) {
        $filter .= " and " ."'". $tableColumn[3]."'";
    }
}
elseif (isset($_GET["resourceFilter"])){
    $filter = "filtering "."'".$tableColumn[3]."'";
}
else{
    $filter = "";
}


if(!empty($list)){    //if the list of items is not empty the table will be shown, else a message that it is empty here.
    ?>


    <div class="container">

        <div class="container-fluid form-inline" style="margin-top: 100px">
            <h2>Search results</h2>
            <h3>for <?php echo "'".$search."'"." ".$filter?></h3>
            

            <table class="table table-bordered table-responsive table-hover" >

                <thead>
                <tr>
                    <th><?php echo $tableColumn[0] ?></th>
                    <th><?php echo $tableColumn[1] ?></th>
                    <th><?php echo $tableColumn[2] ?></th>
                    <th><?php echo $tableColumn[3] ?></th>
                    <th><?php echo $tableColumn[4] ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sl = 0;
                foreach ($list as $item){
                    $sl++;
                    ?>
                    <tr>
                        <td><?php echo  $sl1 = $sl
                                //+$pageStartFrom;?></td>
                        <td><?php echo $item->id ;?></td>
                        <td><?php echo $item->name ;?></td>
                        <td><?php echo $item->level ;?></td>
                        <td>
                            <a href="view.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-info">View</button></a>
                            <a href="edit.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-info">Edit</button></a>
                            <a href="delete.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                <a href="trash.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-warning">Trash</button>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
<?php }
else{
    echo "<div class='container' style='margin-top: 100px; margin-bottom: 350px'>
            <h1>There is no item having '$search' $filter</h1>
            <h3>Please search again.</h3>
           </div>";

}//end of if..else
?>
<?php include "footer.php"?>
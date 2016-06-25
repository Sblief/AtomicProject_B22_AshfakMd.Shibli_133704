<?php
    session_start();
    include_once ("../../../vendor/autoload.php");
    include "header.php";
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    


    $newIndex =  new Picture();


    $tableColumn = array("SL","ID","User Name","Thumbnail","Action","","");

if(array_key_exists('itemPerPage',$_SESSION)) {
    if(array_key_exists('itemPerPage',$_GET))
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
}
else $_SESSION['itemPerPage'] = 5;

$itemPerPage = $_SESSION['itemPerPage'];
$totalItem = $newIndex->count();

$totalPage = ceil($totalItem/$itemPerPage);
$pagination = "";
if(array_key_exists('pageNumber',$_GET)){
    $pageNumber = $_GET['pageNumber'];
}
else $pageNumber = 1;

for($i=1;$i<=$totalPage;$i++){
    $active = ($pageNumber==$i)? "active":"";
    $pagination.="<li class='$active'><a href='index.php?pageNumber=$i'>$i</a></li>";
}

$pageStartFrom = $itemPerPage*($pageNumber-1);
$list = $newIndex->paginator($pageStartFrom,$itemPerPage);

if(!empty($list)){
    ?>

<div class="container">

<div class="container-fluid form-inline" style="margin-top: 100px">
    <h2><?php Uses::siteKeyword() ?> List</h2>

    <?php if(array_key_exists('message',$_SESSION) && (!empty($_SESSION['message'])))
        echo Message::message() ;?>
    <!--    Show item per page Start-->
    <form role="form">
        <div class="form-group">
            <label for="slct">Show

                <select id="slct" class="form-control" name="itemPerPage">
                    <?php for($i=1;$i<26;$i++){
                        if($i==$itemPerPage)
                            echo "<option selected >$i</option>";
                        else echo "<option >$i</option>";
                    }
                    ?>

                </select>
                items per page</label>
            <button class="btn btn-success" type="submit">GO!</button>


        </div>
    </form>
    <!--    Show item per page end-->

    <table class="table table-bordered table-responsive" >

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
            <td><?php echo $sl1 = $sl+$pageStartFrom ;?></td>
            <td><?php echo $item->id ;?></td>
            <td><?php echo $item->name ;?></td>
            <td><img src="../../../resource/images/<?php echo $item->images ;?>" height="50px" width="50px"></td>
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
    <!--    Pagination Start              -->
    <div class="container"  style="margin-bottom: 100px">
        <div class="col-sm-6" align="left" >
            <label>
                <?php
                $start = $pageStartFrom+1;
                $end = $sl1;
                $total = $totalItem;
                if($start==$end)  echo "Showing $start of total $total items ";
                else echo "Showing $start-$end of total $total items ";
                ?>
            </label>
        </div>
        <div class="col-sm-6" align="right" >
            <?php if($totalPage>1){
                ?>
                <ul class="pagination"  >
                    <?php
                    if($pageNumber>1) {
                        $p = $pageNumber -1;
                        echo "<li><a href='index.php?pageNumber=$p'>Prev</a></li>";
                    }
                    else echo "<li class='disabled'><a href=#>Prev</a></li>";
                    ?>

                    <?php echo $pagination ?>
                    <?php
                    if($pageNumber<$totalPage) {
                        $p = $pageNumber +1;
                        echo "<li><a href='index.php?pageNumber=$p'>Next</a></li>";
                    }
                    else echo "<li class='disabled'><a href=#>Next</a></li>";
                    ?>
                </ul>
            <?php } ?>
        </div>
    </div>
    <!--    Pagination End              -->
</div>

<?php }
else{
    echo "<div class='container' style='margin-top: 100px; margin-bottom: 350px'>
            <h1>Empty Index</h1>
            <h3>Please add profile clicking ADD</h3>
           </div>";

}
?>

<?php include "footer.php"?>
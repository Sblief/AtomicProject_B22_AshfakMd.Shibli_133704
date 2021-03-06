<?php
//This page is identical to index page.
session_start();
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\BookTitle\Uses;  //Called the class files used here.
    
    
    $newTrash =  new Book(); // Made an object of class

    //Utility::d($_SESSION);
    
    $tableColumn = array("SL","ID","Book Title","Description","Action","","");

    if(array_key_exists('itemPerTrashPage',$_SESSION)) {
        if(array_key_exists('itemPerTrashPage',$_GET))
            $_SESSION['itemPerTrashPage'] = $_GET['itemPerTrashPage'];
    }
    else $_SESSION['itemPerTrashPage'] = 5;

    $itemPerPage = $_SESSION['itemPerTrashPage'];
    $totalItem = $newTrash->countTrash();

    $totalPage = ceil($totalItem/$itemPerPage);
    $pagination = "";
    if(array_key_exists('trashPageNumber',$_GET)){
        $pageNumber = $_GET['trashPageNumber'];
    }
    else $pageNumber = 1;

    for($i=1;$i<=$totalPage;$i++){
        $active = ($pageNumber==$i)? "active":"";
        $pagination.="<li class='$active'><a href='trashed.php?trashPageNumber=$i'>$i</a></li>";
    }

    $pageStartFrom = $itemPerPage*($pageNumber-1);
    $list = $newTrash->paginatorTrash($pageStartFrom,$itemPerPage);


if(!empty($list)){
?>
    <div class="container" >

    
            <div class="container-fluid form-inline" style="margin-top: 100px">
                <h2>Trashed <?php echo Uses::siteKeyword() ?> List</h2>

                <!--    Show item per page Start-->
                <form role="form">
                    <div class="form-group">
                        <label for="slct">Show
                            <select id="slct" class="form-control" name="itemPerTrashPage">
                                <?php for($i=1;$i<26;$i++){
                                    if($i==$itemPerPage)
                                        echo "<option selected >$i</option>";
                                    else echo "<option >$i</option>";
                                }
                                ?>

                            </select>
                            items per page</label>
                       


                    </div>
                </form>
                <!--    Show item per page end-->
                
                <!--                To recover multiple data sent through post method-->
                <form action="recovermultiple.php" method="post" id="multiple"> 
                <button type="submit"  class="btn btn-warning">Recover Selected</button>
<!--                 To delete multiple id is used for jquery to send data to other page-->
                <button type="button"  class="btn btn-danger" id="multiple_delete" >Delete Selected</button>
                    <h4><?php echo Message::message(); ?></h4>

                    
                <table class="table table-bordered table-responsive table-hover" >
    
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"/>Check Item</th>
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
                            <td><input type="checkbox" name="mark[]" value="<?php echo $item->ID ?>"></td>
                            <td><?php echo $sl1 = $sl+$pageStartFrom ;?></td>
                            <td><?php echo $item->ID ;?></td>
                            <td><?php echo $item->bookTitle ;?></td>
                            <td><?php echo $item->description ;?></td>
                            <td>
                                <a href="recover.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-warning">Recover</button>
                                <a href="delete.php?id=<?php echo $item->ID ?>&fromtrash=true"  ><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                    
                            </td>
                        </tr>
                    <?php } ?>
    
                    </tbody>
                </table>
                </form>
            </div>
        <!--    Pagination Start              -->
        <div class="container"  style="margin-bottom: 100px">
            <div class="col-sm-6" align="left">
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
            <div class="col-sm-6" align="right">
                <?php if($totalPage>1){
                    ?>
                    <ul class="pagination"  >
                        <?php
                        if($pageNumber>1) {
                            $p = $pageNumber -1;
                            echo "<li><a href='trashed.php?trashPageNumber=$p'>Prev</a></li>";
                        }
                        else echo "<li class='disabled'><a href=#>Prev</a></li>";
                        ?>

                        <?php echo $pagination ?>
                        <?php
                        if($pageNumber<$totalPage) {
                            $p = $pageNumber +1;
                            echo "<li><a href='trashed.php?trashPageNumber=$p'>Next</a></li>";
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
            <h1>Empty Trash Box</h1>
            <h3>When you trash something from list that will show up here</h3>
           </div>";

}
?>

<script>
    $('#multiple_delete').on('click',function () {
        document.forms[1].action= "deletemultiple.php";
        $('#multiple').submit();

    });



    $(function() {
        $('#slct').change(function() {
            this.form.submit();
        });
    });
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

</script>
<?php include ('footer.php');?>

<?php
//This page is identical to index page.
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\BookTitle\Uses;  //Called the class files used here.
    
    
    $newTrash =  new Book(); // Made an object of class
    $list = $newTrash->trashed(); //receive trashed data and assign in the variable
    //Utility::d($_SESSION);
    
    $tableColumn = array("SL","ID","Book Title","Action","","");
    
?>

<?php
if(!empty($list)){
?>
    
        <div class="container">

    
            <div class="container-fluid" style="margin-top: 100px">
                <h2>Trashed <?php Uses::siteKeyword() ?> List</h2>
<!--                To recover multiple data sent through post method-->
                <form action="recovermultiple.php" method="post" id="multiple"> 
                <button type="submit"  class="btn btn-warning">Recover Selected</button>
<!--                 To delete multiple id is used for jquery to send data to other page-->
                <button type="button"  class="btn btn-danger" id="multiple_delete">Delete Selected</button>
                    <h2><?php echo Message::message(); ?></h2>
                <table class="table table-bordered table-responsive">
    
                    <thead>
                    <tr>
                        <th>Check Item</th>
                        <th><?php echo $tableColumn[0] ?></th>
                        <th><?php echo $tableColumn[1] ?></th>
                        <th><?php echo $tableColumn[2] ?></th>
                        <th><?php echo $tableColumn[3] ?></th>
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
                            <td><?php echo $sl ;?></td>
                            <td><?php echo $item->ID ;?></td>
                            <td><?php echo $item->bookTitle ;?></td>
                            <td>
                                <a href="recover.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-warning">Recover</button>
                                <a href="delete.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-danger" id="delete">Delete</button>
                                    
                            </td>
                        </tr>
                    <?php } ?>
    
                    </tbody>
                </table>
                </form>
            </div>
            <div class="container" align="right" style="margin-bottom: 100px">
                <ul class="pagination"  >
                    <li><a href="#"><</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">></a></li>
                </ul>
            </div>
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
        document.forms[0].action= "deletemultiple.php";
        $('#multiple').submit();

    })
</script>
<?php include ('footer.php');?>

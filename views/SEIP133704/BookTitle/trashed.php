<?php
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\BookTitle\Utility;
    use App\Bitm\SEIP133704\BookTitle\Message;
    
    
    $newBook =  new Book();
    $bookList = $newBook->trashed();
    //Utility::d($_SESSION);
    
    $tableColumn = array("SL","ID","Book Title","Action","","");
    
    ?>
    
        <div class="container">
    
            <div class="container-fluid" style="margin-top: 100px">
                <h2>Trashed Book List</h2>
                <form action="recovermultiple.php" method="post" id="multiple">
                <button type="submit"  class="btn btn-warning">Recover Selected</button>
                <button type="button"  class="btn btn-danger" id="multiple_delete">Delete Selected</button>
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
                    foreach ($bookList as $books){
                        $sl++;
                        ?>
                        <tr>
                            <td><input type="checkbox" name="mark[]" value="<?php echo $books->ID ?>"></td>
                            <td><?php echo $sl ;?></td>
                            <td><?php echo $books->ID ;?></td>
                            <td><?php echo $books->bookTitle ;?></td>
                            <td>
                                <a href="recover.php?id=<?php echo $books->ID ?>" ><button type="button" class="btn btn-warning">Recover</button>
                                <a href="delete.php?id=<?php echo $books->ID ?>" ><button type="button" class="btn btn-danger" id="delete">Delete</button>
                                    
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

<script>
    $('#multiple_delete').on('click',function () {
        document.forms[0].action= "deletemultiple.php";
        $('#multiple').submit();

    })
</script>
<?php include "footer.php"?>
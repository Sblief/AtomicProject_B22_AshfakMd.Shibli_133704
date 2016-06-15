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
                <table class="table table-bordered table-responsive">
    
                    <thead>
                    <tr>
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
<?php include "footer.php"?>
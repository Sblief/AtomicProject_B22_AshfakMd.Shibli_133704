<?php
    session_start();
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\BookTitle\Uses;


    $newBook =  new Book();
    $bookList = $newBook->index();
    //Utility::d($_SESSION);

    $tableColumn = array("SL","ID","Book Title","Action","","");

?>

<div class="container">

<div class="container-fluid" style="margin-top: 100px">
    <h2><?php Uses::siteKeyword() ?> List</h2>

    <?php if(array_key_exists('message',$_SESSION) && (!empty($_SESSION['message'])))
        echo Message::message() ;?>
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
                <a href="view.php?id=<?php echo $books->ID ?>" ><button type="button" class="btn btn-info">View</button></a>
                <a href="edit.php?id=<?php echo $books->ID ?>" ><button type="button" class="btn btn-info">Edit</button></a>
                <a href="delete.php?id=<?php echo $books->ID ?>" ><button type="button" class="btn btn-danger" id="delete">Delete</button>
                    <a href="trash.php?id=<?php echo $books->ID ?>" ><button type="button" class="btn btn-warning">Trash</button>
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
    <script>
        $(document).ready(function(){
            $("#delete").click(function(){
                if (!confirm("Do you want to delete")){
                    return false;
                }
            });
        });

    </script>
<?php include "footer.php"?>
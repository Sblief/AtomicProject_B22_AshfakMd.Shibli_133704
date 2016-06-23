<?php
    session_start(); //started a session to store the Message comes from a action
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    include "header.php";             // Made header as a separate file as it will be used in every page
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\BookTitle\Uses;         //Called the class files used here.


    $newIndex =  new Book();   // Made an object of class
    $list = $newIndex->index(); // called index method of the class. Assigned the return value from the method in a variable to use later.
    //Utility::d($_SESSION); //Utility static class an d method called for debugging a variable.

    $tableColumn = array("SL","ID","Book Title","Action","","");  //Table column heads are taken in an array to change easily

?>

<?php
if(!empty($list)){    //if the list of items is not empty the table will be shown, else a message that it is empty here.
    ?>

<div class="container">

<div class="container-fluid" style="margin-top: 100px">
    <h2><?php Uses::siteKeyword() ?> List</h2>

    <?php if(array_key_exists('message',$_SESSION) && (!empty($_SESSION['message'])))
        echo Message::message() ;  // if the session variable is not empty then it contains a message. so,the message is echoed.?>
    <table class="table table-bordered table-responsive">

        <thead>
        <tr>
<!--            table heads are taken from array-->
            <th><?php echo $tableColumn[0] ?></th>
            <th><?php echo $tableColumn[1] ?></th>
            <th><?php echo $tableColumn[2] ?></th>
            <th><?php echo $tableColumn[3] ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sl = 0;   //for serial number start from  1.
        foreach ($list as $item){  //Taken the list and as an array object items will be used.
            $sl++; //incremented every time of foreach loop
            ?>
        <tr>
            <!--     serial number-->
            <td><?php echo $sl ;?></td>
            <!--     $item is an object so object notation used. after ->  '' is the field of $list which we fetched from database using index method in class-->
            <td><?php echo $item->ID ;?></td>
            <td><?php echo $item->bookTitle ;?></td>
            <td>
                <a href="view.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-info">View</button></a>
                <a href="edit.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-info">Edit</button></a>
                <a href="delete.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-danger" id="delete">Delete</button>
                    <a href="trash.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-warning">Trash</button>
            </td>
        </tr>
        <?php }//end of foreach loop ?>

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
<?php }
else{
    echo "<div class='container' style='margin-top: 100px; margin-bottom: 350px'>
            <h1>Empty Index</h1>
            <h3>Please add books clicking ADD</h3>
           </div>";

}//end of if..else
?>


    <script>
        $(document).ready(function(){
            $("#delete").click(function(){
                if (!confirm("Do you want to delete")){
                    return false;
                }
            });
        });

    </script>
<?php include "footer.php"?>  // Made footer as a separate file as it will be used in every page?> 
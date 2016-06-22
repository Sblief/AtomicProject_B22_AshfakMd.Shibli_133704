<?php
    session_start();
    include_once ("../../../vendor/autoload.php");
    include "header.php";
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    


    $newProfile =  new Picture();
    $profileList = $newProfile->index();

    $tableColumn = array("SL","ID","User Name","Thumbnail","Action","","");

?>
<?php
if(!empty($profileList)){
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
            <th><?php echo $tableColumn[4] ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sl = 0;
        foreach ($profileList as $item){
            $sl++;
            ?>
        <tr>
            <td><?php echo $sl ;?></td>
            <td><?php echo $item->id ;?></td>
            <td><?php echo $item->name ;?></td>
            <td><img src="../../../resource/images/<?php echo $item->images ;?>" height="50px" width="50px"></td>
            <td>
                <a href="view.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-info">View</button></a>
                <a href="edit.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-info">Edit</button></a>
                <a href="delete.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-danger" id="delete">Delete</button>
                    <a href="trash.php?id=<?php echo $item->id ?>" ><button type="button" class="btn btn-warning">Trash</button>
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

<?php }
else{
    echo "<div class='container' style='margin-top: 100px; margin-bottom: 350px'>
            <h1>Empty Index</h1>
            <h3>Please add profile clicking ADD</h3>
           </div>";

}
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
<?php include "footer.php"?>
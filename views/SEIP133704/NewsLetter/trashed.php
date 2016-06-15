<?php
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\NewsLetter\Email;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\NewsLetter\Uses;
    
    
    $newEmail =  new Email();
    $emailList = $newEmail->trashed();
    //Utility::d($_SESSION);
    
    $tableColumn = array("SL","ID","Email Addresses","Action","","");
    
?>
    
        <div class="container">

    
            <div class="container-fluid" style="margin-top: 100px">
                <h2>Trashed <?php Uses::siteKeyword() ?> List</h2>
                <?php
                    if(!empty($emailList)){
                ?>
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
                    foreach ($emailList as $emails){
                        $sl++;
                        ?>
                        <tr>
                            <td><input type="checkbox" name="mark[]" value="<?php echo $emails->ID ?>"></td>
                            <td><?php echo $sl ;?></td>
                            <td><?php echo $emails->ID ;?></td>
                            <td><?php echo $emails->email_address ;?></td>
                            <td>
                                <a href="recover.php?id=<?php echo $emails->ID ?>" ><button type="button" class="btn btn-warning">Recover</button>
                                <a href="delete.php?id=<?php echo $emails->ID ?>" ><button type="button" class="btn btn-danger" id="delete">Delete</button>
                                    
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
        echo "<br><h1>Empty Trash Box</h1>";
      
    }
?>

<script>
    $('#multiple_delete').on('click',function () {
        document.forms[0].action= "deletemultiple.php";
        $('#multiple').submit();

    })
</script>

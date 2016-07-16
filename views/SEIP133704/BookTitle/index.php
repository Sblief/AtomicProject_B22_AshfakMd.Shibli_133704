<?php
    session_start(); //started a session to store the Message comes from a action
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    include ('header.php');          // Made header as a separate file as it will be used in every page
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\BookTitle\Uses;         //Called the class files used here.


    $newIndex =  new Book();   // Made an object of class
    //Utility::d($_SESSION); //Utility static class an d method called for debugging a variable.

    

    $tableColumn = array("SL","ID","Book Title","Action","","");  //Table column heads are taken in an array to change easily

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
    //coming from create page
    else if(array_key_exists('totalPage',$_SESSION)){
        $pageNumber = $_SESSION['totalPage'];
        unset($_SESSION['totalPage']);
    }
    //coming from create page
    else $pageNumber = 1;

//back to this page
$pageNumberBack = $pageNumber;
$totalPageBack = ceil(($totalItem-1)/$itemPerPage);
if($totalPage == $pageNumber){
    if($totalPageBack<$totalPage){
        $pageNumberBack = $pageNumber-1;
    }
}
//back to this page

    for($i=1;$i<=$totalPage;$i++){
        $active = ($pageNumber==$i)? "active":"";
        $pagination.="<li class='$active'><a href='index.php?pageNumber=$i'>$i</a></li>";
    }

    $pageStartFrom = $itemPerPage*($pageNumber-1);
    $list = $newIndex->paginator($pageStartFrom,$itemPerPage);



    if(!empty($list)){    //if the list of items is not empty the table will be shown, else a message that it is empty here.

?>
<!--       Send Mail Modal Start-->
<div class="container" >

    <div id="form-content" class="modal fade in " >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Send via Email</h3>
                </div>
                <form class="contact" name="contact">
        <div class="modal-body">
            <div class="container-fluid">
                <div class="container-fluid col-sm-6">
                    <input type="number" class="form-control hidden" name="id" placeholder="Enter ID" id="getId">
                    <label class="control-label">Recipients name</label>
                    <input type="text" class="form-control"  name="receiverName" placeholder="Enter Name" required>
                    <label class="control-label">Recipients Email</label>
                    <input type="email" class="form-control"  name="receiverEmail" placeholder="Email Address" required>

                </div>

            </div>
        </div>
                <div class="modal-footer">
                    <label id="loading-image" hidden><img  src="../../../resource/CustomDesign/image/hourglass (1).gif" >Please wait we are sending your email...</label>
                    <a class="btn btn-success " id="submit" type="submit">Send</a>
                    <button href="#" class="btn btn-danger" data-dismiss="modal" id="cancel">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<!--  Send Mail  Modal End       -->
<!--    Confirm-Delete Modal Start-->
    <div class="modal fade in" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <p>Once Deleted it cannot be undone. It's safer to trash.</p>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to Delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!--    Confirm-Delete Modal End-->



    <div class="container-fluid"  style="margin-top: 100px">
        
        <div class="container-fluid">
            <div class="col-sm-3">
                <h2><?php echo Uses::siteKeyword() ?> List</h2>
            </div>
<!--            Download button-->
            <div id="download" class="col-sm-9">
                <a href="#" class="dropdown-toggle"  data-toggle="dropdown"><button class="btn btn-info"> Download/Send  <span class="caret"></span></button></a>
                <ul class="dropdown-menu">
                    <li><a href="pdf.php">Download as PDF</a></li>
                    <li role="presentation" class="divider"></li>
                    <li><a href="excel.php">Download as Excel</a></li>
                    <li role="presentation" class="divider"></li>
                    <li><a data-toggle="modal" href="#form-content">Send to a Friend</a></li>

                </ul>
            </div>
            <!--            Download button          -->
            
        </div>
<!--        Message Area-->
    <div id="msg"><?php if(array_key_exists('message',$_SESSION) && (!empty($_SESSION['message'])))
        echo Message::message() ;  // if the session variable is not empty then it contains a message. so,the message is echoed.?>
    </div>
        <!--        Message Area-->
        
        <!--    Show item per page Start-->

        <div class="form-inline">
            <form role="form">
                <div class="form-group">
                    <label for="slct">Show

                    <select id="slct" class="form-control" name="itemPerPage"  >
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
        </div>

    <!--    Show item per page end-->

           <!--    Table Start-->
    <table class="table table-bordered table-responsive table-hover" >

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
            <td><?php echo $sl1 = $sl+$pageStartFrom ;?></td>
            <!--     $item is an object so object notation used. after ->  '' is the field of $list which we fetched from database using index method in class-->
            <td><?php echo $item->ID ;?></td>
            <td><?php echo $item->bookTitle ;?></td>
            <td>
                <a href="view.php?id=<?php echo $item->ID ?>" ><button type="button" class="btn btn-info">View</button></a>
                <a href="edit.php?id=<?php echo $item->ID ?>&bringBackPage=<?php echo $pageNumber ?>" ><button type="button" class="btn btn-info">Edit</button></a>
<!--                Delete Button by Modal-->
                <a href="#" data-href="delete.php?id=<?php echo $item->ID ?>&bringBackPage=<?php echo $pageNumberBack ?>"  data-toggle="modal" data-target="#confirm-delete" >
                    <button type="button" class="btn btn-danger" >Delete</button></a>
<!--                Delete Button by Modal-->
                <a href="trash.php?id=<?php echo $item->ID ?>&bringBackPage=<?php echo $pageNumberBack ?>" ><button type="button" class="btn btn-warning">Trash</button>
<!--                 Send email single Item by Modal-->
                <a data-toggle="modal" data-target="#form-content" data-id="<?php echo $item->ID ?>" class="dialog"><button type="button" class="btn btn-success">Send Item to Friend</button>
<!--                 Send email single Item by Modal-->   
            </td>
        </tr>
        <?php }//end of foreach loop ?>

        </tbody>
    </table>
    <!--    Table end    -->
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
<?php
       // $_SESSION['currentPage'] = $pageNumber;
    }
else{
    echo "<div class='container' style='margin-top: 100px; margin-bottom: 350px'>
            <h1>Empty Index</h1>
            <h3>Please add books clicking ADD</h3>
           </div>";

}//end of if..else
?>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $(function() {
        $('#slct').change(function() {
            this.form.submit();
        });
    });
    $(document).on("click", ".dialog", function () {
        var ID = $(this).data('id');
        $(".modal-body #getId").val( ID );
    });

    $(document).ready(function () {

        $("a#submit").click(function(){

            $(this).toggleClass('active');
            $.ajax({
                type: "POST",
                url: "sendmail.php", //process to mail
                data: $('form.contact').serialize(),
                beforeSend: function(){
                    $('label#loading-image').show();
                    $('a#submit').hide();
                },
                success: function(){
                    $("#msg").html("<div id=\"message\" class=\"alert alert-info\"> <strong>Success!</strong> Data has been sent successfully.</div> ");
                    $('#message').show().delay(2000).fadeOut();
                    $("#form-content").modal('hide'); //hide popup
                },
                complete: function(){
                    $('label#loading-image').hide();
                    $('a#submit').show();
                    $(".contact")[0].reset();

                },
                error: function(){
                    $("#msg").html("<div id=\"message\" class=\"alert alert-danger\"> <strong>Failure!</strong> Data has not been sent successfully.</div> ");
                    $('#message').show().delay(2000).fadeOut();
                    $("#form-content").modal('hide'); //hide popup
                }
            });

        });
        $("button#cancel").click(function(){
            $(".contact")[0].reset();
        });
        


    });

</script>

<?php include "footer.php"?>

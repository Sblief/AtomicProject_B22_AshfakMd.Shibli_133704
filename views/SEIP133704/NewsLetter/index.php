<?php
    session_start();
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\NewsLetter\Email;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\NewsLetter\Uses;


    $newIndex =  new Email();
    $list = $newIndex->index();
    //Utility::d($_SESSION);

    $tableColumn = array("SL","ID","Name","Email Addresses","Action","","");

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


<div class="container">

<div class="container-fluid form-inline" style="margin-top: 100px">
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
                <li><a  href="mailformatter.php">Send to a Friend</a></li>

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


        </div>
    </form>
    <!--    Show item per page end-->
    
    <table class="table table-bordered table-responsive table-hover" >

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
        foreach ($list as $emails){
            $sl++;
            ?>
        <tr>
            <td><?php echo $sl1 = $sl+$pageStartFrom  ;?></td>
            <td><?php echo $emails->ID ;?></td>
            <td><?php echo $emails->name ;?></td>
            <td><?php echo $emails->email_address ;?></td>
            <td>
                <a href="view.php?id=<?php echo $emails->ID ?>" ><button type="button" class="btn btn-info">View</button></a>
                <a href="edit.php?id=<?php echo $emails->ID ?>&bringBackPage=<?php echo $pageNumber ?>" ><button type="button" class="btn btn-info">Edit</button></a>
                <a href="delete.php?id=<?php echo $emails->ID ?>&bringBackPage=<?php echo $pageNumberBack ?>" ><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    <a href="trash.php?id=<?php echo $emails->ID ?>&bringBackPage=<?php echo $pageNumberBack ?>" ><button type="button" class="btn btn-warning">Trash</button>
                        <a href="mailformatter.php?id=<?php echo $emails->ID ?>"  ><button type="button" class="btn btn-success">Send Newsletter</button>

            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
    <!--    Pagination Start              -->
    <div class="container"  style="margin-bottom: 100px">
        <div class="col-sm-6" align="left" >
            <label style="background-color: #f3f6f6">
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
            <h3>Please add emails clicking ADD</h3>
           </div>";

}//end of if..else
?>
    <script>
        $(function() {
            $('#slct').change(function() {
                this.form.submit();
            });
        });
    </script>
<?php include "footer.php"?>
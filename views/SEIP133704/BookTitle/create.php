<?php
    include_once ('../../../vendor/autoload.php');   //Autoload file included to recognize namespace
    include "header.php";          // Made header as a separate file as it will be used in every page
    use App\Bitm\SEIP133704\BookTitle\Uses; //Called the class files used here.


?>
<title>
    <!--    Site's Keyword was fetched from Uses Class for changing site name will be easy-->
    <?php echo Uses::siteKeyword()  ?>  

</title>
<div class="container">
    <div class="container-fluid" style=" margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="form-group">
                <label class="control-label col-sm-2"><?php echo Uses::siteKeyword()  ?></label>
                <div class="col-sm-6">
<!--                    Mind it! name field goes in $_POST. We will use it on other pages-->
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your <?php echo Uses::siteKeyword()  ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>


        </form>
    </div>
</div>

<?php include "footer.php";  // Made footer as a separate file as it will be used in every page?>

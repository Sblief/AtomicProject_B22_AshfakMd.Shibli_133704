<?php
    include "header.php";
    $siteDataKeyword = "Book Title";


?>
<title>
    Book
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Enter <?php echo $siteDataKeyword  ?>

            </h2>
            <div class="form-group">
                <label class="control-label col-sm-2"><?php echo $siteDataKeyword  ?></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your <?php echo $siteDataKeyword  ?>">
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
<?php include "footer.php"?>


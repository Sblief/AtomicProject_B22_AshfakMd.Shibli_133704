<?php
    include "header.php";
    use App\Bitm\SEIP133704\NewsLetter\Uses;


?>
<title>
    <?php echo Uses::siteKeyword()  ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="form-group">
                <label class="control-label col-sm-2"><?php echo Uses::siteKeyword() ?></label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="title" name="title" placeholder="Enter Your <?php echo Uses::siteKeyword()  ?>">
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


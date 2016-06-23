<?php
    include "header.php";
    use App\Bitm\SEIP133704\OrganizationSummary\Summary;
    use App\Bitm\SEIP133704\OrganizationSummary\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;
    use App\Bitm\SEIP133704\GlobalClasses\Message;


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
            <div class="container-fluid">

                <div class="container-fluid col-sm-6">
                    <label class="control-label"> Organization name</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Enter Your Organization Name" required>
                    <label class="control-label"><?php echo Uses::siteKeyword() ?></label>
                    <textarea  class="form-control" id="summary" name="summary" placeholder="Enter Your <?php echo Uses::siteKeyword()  ?>" required> </textarea>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                
            </div>
        </form>
    </div>
</div>
<?php include "footer.php"?>


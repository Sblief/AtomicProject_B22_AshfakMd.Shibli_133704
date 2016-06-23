<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\OrganizationSummary\Summary;
use App\Bitm\SEIP133704\OrganizationSummary\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;

    $edit = new Summary();
    $edit->prepare($_GET);
    $singleItem = $edit->view();
?>
<?php include "header.php" ?>
<title>
    <?php Uses::siteKeyword() ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 130px; margin-top: 100px; padding-left: 200px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php Uses::siteKeyword() ?>
            </h2>
            <div class="form-group">
                <div class="col-sm-6">
                    <label class="control-label">Enter Name</label>
                    <input type="hidden" name="id" id="title" value="<?php echo $singleItem->ID ?>">
                    <input type="text" class="form-control" id="org" name="name" placeholder="Enter Your Name" value="<?php echo $singleItem->name ?>" required>
                    <label class="control-label"><?php Uses::siteKeyword() ?></label>
                    <textarea  class="form-control" id="summary" name="summary" required> <?php echo $singleItem->summary ?> </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="container">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
<?php include "footer.php"?>


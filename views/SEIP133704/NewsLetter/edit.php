<?php
    include_once ("../../../vendor/autoload.php");
    use App\Bitm\SEIP133704\NewsLetter\Email;
    use App\Bitm\SEIP133704\NewsLetter\Uses;

    $edit = new Email();
    $edit->prepare($_GET);
    $singleItem = $edit->view();
?>
<?php include "header.php" ?>
<title>
    <?php Uses::siteKeyword() ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php Uses::siteKeyword() ?>
            </h2>
            <div class="form-group">
                <label class="control-label col-sm-2"><?php Uses::siteKeyword() ?></label>
                <div class="col-sm-6">
                    <input type="hidden" name="id" id="title" value="<?php echo $singleItem->ID ?>">
                    <input type="email" class="form-control" id="title" name="title" placeholder="Enter <?php Uses::siteKeyword() ?>" value="<?php echo $singleItem->email_address ?>">
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


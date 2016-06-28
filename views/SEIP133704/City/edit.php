<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

    $edit = new City();
    $edit->prepare($_GET);
    $singleItem = $edit->view();
    $array = explode(",",$singleItem->city);
  
?>
<?php include "header.php" ?>
<title>
    <?php Uses::siteKeyword() ?>
</title>
<div class="container ">
    <div class="container-fluid col-sm-6" style="margin-bottom: 220px; margin-top: 90px">
        <form class="form-group form-inline" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 50px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container">
                <label for="name">Name: </label>
                <input id="name" type="text" name="name" placeholder="Your Name" value="<?php echo $singleItem->name ?>">
                <input id="id" type="hidden" name="id"  value="<?php echo $singleItem->ID ?>">
            </div>
            <div class="container" style="margin-top: 20px">
                <label for="city" style="padding-left: 15px">City: </label>
                <select name="city[]" id="city" multiple size="7">
                <option value="Dhaka" <?php City::checked("Dhaka", $array )  ?> >Dhaka</option>
                <option value="Chittagong" <?php City::checked("Chittagong", $array )  ?>>Chittagong</option>
                <option value="Barishal" <?php City::checked("Barishal", $array )  ?>>Barishal</option>
                <option value="Rajshahi" <?php City::checked("Rajshahi", $array )  ?> >Rajshahi</option>
                <option value="Khulna" <?php City::checked("Khulna", $array )  ?> >Khulna</option>
                <option value="Rangpur" <?php City::checked("Rangpur", $array )  ?> >Rangpur</option>
                <option value="Sylhet" <?php City::checked("Sylhet", $array )  ?> >Sylhet</option>
                </select>
            </div>
            <div class="container" style="padding-left: 200px">
                <button type="submit" class="btn btn-success">SUBMIT</button>

            </div>

        </form>
    </div>
</div>
<?php include "footer.php"?>



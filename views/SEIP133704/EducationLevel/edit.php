<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

    $edit = new City();
    $edit->prepare($_GET);
    $singleItem = $edit->view();
  
?>
<?php include "header.php" ?>
<title>
    <?php Uses::siteKeyword() ?>
</title>
<div class="container ">
    <div class="container-fluid col-sm-6" style="margin-bottom: 220px; margin-top: 90px">
        <form class="form-group form-inline" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 50px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container">
                <label for="name">Name: </label>
                <input id="name" type="text" name="name" placeholder="Your Name" value="<?php echo $singleItem->name ?>">
            </div>
            <div class="container" style="margin-top: 20px">
                <label for="city" style="padding-left: 15px">City: </label>
                <select name="city" id="city" >
                <option value="Dhaka" <?php City::checked("Dhaka", $singleItem->city )  ?> >Dhaka</option>
                <option value="Chittagong" <?php City::checked("Chittagong", $singleItem->city )  ?>>Chittagong</option>
                <option value="Barishal" <?php City::checked("Barishal", $singleItem->city )  ?>>Barishal</option>
                <option value="Rajshahi" <?php City::checked("Rajshahi", $singleItem->city )  ?> >Rajshahi</option>
                <option value="Khulna" <?php City::checked("Khulna", $singleItem->city )  ?> >Khulna</option>
                <option value="Rangpur" <?php City::checked("Rangpur", $singleItem->city )  ?> >Rangpur</option>
                <option value="Sylhet" <?php City::checked("Sylhet", $singleItem->city )  ?> >Sylhet</option>
                </select>
            </div>
            <div class="container" style="padding-left: 200px">
                <button type="submit" class="btn btn-success">SUBMIT</button>

            </div>

        </form>
    </div>
</div>
<?php include "footer.php"?>



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
<div class="container">
    <div class="container-fluid" style="margin-bottom: 130px; margin-top: 100px; padding-left: 200px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php Uses::siteKeyword() ?>
            </h2>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" placeholder="Your Name">
            <select name="city" id="city">
                <option value="Dhaka" <?php City::checked("Dhaka", $singleItem->city )  ?> >Dhaka</option>
                <option value="CTG" <?php City::checked("CTG", $singleItem->city )  ?>>CTG</option>
                <option value="Barishal" <?php City::checked("Barishal", $singleItem->city )  ?>>Barishal</option>
                <option value="Rajshahi" <?php City::checked("Rajshahi", $singleItem->city )  ?> >Rajshahi</option>
            </select>
            <button type="submit" class="btn btn-success">SUBMIT</button>

        </form>
    </div>
</div>
<?php include "footer.php"?>


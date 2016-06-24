<?php
    include "header.php";
    use App\Bitm\SEIP133704\City\City;
    use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;


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
            <label for="name">Name</label>
            <input id="name" type="text" name="name" placeholder="Your Name">
            <select name="city" id="city">
                            <option value="Dhaka" >Dhaka</option>
                            <option value="CTG" >CTG</option>
                            <option value="Barishal" >Barishal</option>
                            <option value="Rajshahi" >Rajshahi</option>
            </select>
            <button type="submit" class="btn btn-success">SUBMIT</button>

        </form>
    </div>
</div>
<?php include "footer.php"?>


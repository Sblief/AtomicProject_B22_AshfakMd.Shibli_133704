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
<div class="container ">
    <div class="container-fluid col-sm-6" style="margin-bottom: 220px; margin-top: 90px">
        <form class="form-group form-inline" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 50px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container">
            <label for="name">Name: </label>
            <input id="name" type="text" name="name" placeholder="Your Name">
            </div>
            <div class="container" style="margin-top: 20px">
            <label for="city" style="padding-left: 15px">City: </label>
            <select name="city" id="city" >
                            <option >Select one</option>
                            <option value="Dhaka" >Dhaka</option>
                            <option value="Chittagong" >Chittagong</option>
                            <option value="Barishal" >Barishal</option>
                            <option value="Rajshahi" >Rajshahi</option>
                            <option value="Khulna" >Khulna</option>
                            <option value="Rangpur" >Rangpur</option>
                            <option value="Sylhet" >Sylhet</option>
            </select>
            </div>
            <div class="container" style="padding-left: 200px">
                <button type="submit" class="btn btn-success">SUBMIT</button>

            </div>



        </form>
    </div>
</div>
<?php include "footer.php"?>


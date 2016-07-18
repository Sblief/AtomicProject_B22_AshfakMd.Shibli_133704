<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\City\City;
use App\Bitm\SEIP133704\City\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;


?>

<?php include "header.php" ?>
<div class="container " style="margin-top: 100px" >
                    <h3>Send via Email</h3>

                <form class="contact " name="contact" method="post" action="sendmail.php">
                    <input type="number" class="form-control hidden" name="id" value="<?php echo $_GET['id']?>">
                    <label class="control-label">Recipients name</label>
                    <input type="text" class="form-control"  name="receiverName" placeholder="Enter Name" required>
                    <label class="control-label">Recipients Email</label>
                    <input type="email" class="form-control"  name="receiverEmail" placeholder="Email Address" required>
                    <button class="btn btn-success " id="submit" type="submit">Send</button>


                </form>

</div>
<?php include "footer.php" ?>
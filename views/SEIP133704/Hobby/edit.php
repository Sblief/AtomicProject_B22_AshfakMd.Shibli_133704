<?php
include_once ("../../../vendor/autoload.php");
include "header.php";
use App\Bitm\SEIP133704\Hobby\Uses;
use App\Bitm\SEIP133704\Hobby\Hobby;


    $hobby =  new Hobby();
    $hobby->prepare($_GET);
    $dataArrayFromDB =  $hobby->view();
    $dataArray = explode(",",$dataArrayFromDB['hobby_list']);
?>


    <div class="container" style="margin-top: 100px ;margin-bottom: 150px">
        <h2>Edit  your hobby</h2>

        <form role="form" method="post" action="update.php?id=<?php echo $_GET['id'] ?>">
            <input type="hidden" name="bringBackPage" id="bringBackPage" value="<?php echo $_GET['bringBackPage']?>">
            <div>
                <label for="user">User Name</label>
                
                <input type="text" name="name" placeholder="Enter your name" value="<?php echo $dataArrayFromDB['name']  ?>" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name=hobby[] value="Cricket" <?php Hobby::checked("Cricket", $dataArray)  ?>>Playing Cricket</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name=hobby[] value="Playing Football" <?php Hobby::checked("Playing Football", $dataArray)  ?> >Playing Football</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name=hobby[] value="Coding" <?php Hobby::checked("Coding", $dataArray)  ?> >Coding</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name=hobby[] value="Vollyball" <?php Hobby::checked("Vollyball" , $dataArray)  ?> >Vollyball</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name=hobby[] value="Swimming" <?php Hobby::checked("Swimming", $dataArray)  ?>>Swimming</label>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>

<?php  include "footer.php"?>
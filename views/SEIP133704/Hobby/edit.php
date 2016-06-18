<?php
include_once ("../../../vendor/autoload.php");
include "header.php";
use App\Bitm\SEIP133704\Hobby\Uses;
use App\Bitm\SEIP133704\Hobby\Hobby;

//$create = new Hobby();
//echo $create->create();

    $hobby =  new Hobby();
    $hobby->prepare($_GET);
    $dataArray =  $hobby->view();
    //var_dump($dataArray);
    $dataArray = explode(",",$dataArray['hobby_list']);
    echo $dataArray;

?>


    <div class="container" style="margin-top: 100px">
        <h2>Edit  your hobby</h2>

        <form role="form" method="post" action="update.php?id=<?php echo $_GET['id'] ?>">
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
            <input type="submit" value="Submit">
        </form>
    </div>

<?php  include "footer.php"?>
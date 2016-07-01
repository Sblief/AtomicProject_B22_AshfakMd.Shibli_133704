<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\EducationLevel\Education;
use App\Bitm\SEIP133704\EducationLevel\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

    $edit = new Education();
    $edit->prepare($_GET);
    $singleItem = $edit->view();
  
?>
<?php include "header.php" ?>
<title>
    <?php Uses::siteKeyword() ?>
</title>
<div class="container ">
    <div class="container-fluid" style="margin-bottom: 220px; margin-top: 90px">
        <form class="form-group form-inline" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 50px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container">
                <label for="name">Name: </label>
                <input type="hidden" name="bringBackPage" id="bringBackPage" value="<?php echo $_GET['bringBackPage']?>">
                <input id="name" type="text" name="name" placeholder="Your Name" value="<?php echo $singleItem->name ?>">
                <input name="id" class="hidden" value="<?php echo $singleItem->id ?>">
            </div>
            <div class="container-fluid" style="margin-top: 20px">
                <label for="form" ">Select One: </label>

                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Primary Education" <?php Education::checked("Primary Education", $singleItem->level )  ?>>Primary Education</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Junior School Certificate(J.S.C)" <?php Education::checked("Junior School Certificate(J.S.C)", $singleItem->level )  ?>>Junior School Certificate(J.S.C)</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Secondary School Certificate(S.S.C)" <?php Education::checked("Secondary School Certificate(S.S.C)", $singleItem->level )  ?> >Secondary School Certificate(S.S.C)</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Higher Secondary Certificate(H.S.C)" <?php Education::checked("Higher Secondary Certificate(H.S.C)", $singleItem->level )  ?>>Higher Secondary Certificate(H.S.C)</label>
                    </div>
                    <div class="radio col-sm-12 ">
                        <label><input type="radio" name="level" value="B.S.C/B.A/B.B.A" <?php Education::checked("B.S.C/B.A/B.B.A", $singleItem->level )  ?>>B.S.C/B.A/B.B.A</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="M.S.C/M.A/M.B.A" <?php Education::checked("M.S.C/M.A/M.B.A", $singleItem->level )  ?>>M.S.C/M.A/M.B.A</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Phd." <?php Education::checked("Phd.", $singleItem->level )  ?> >Phd.</label>
                    </div>
                <div class="container col-sm-12" style="padding-left: 200px">
                    <button type="submit" class="btn btn-success">SUBMIT</button>

                </div>
            </div>

        </form>
    </div>
</div>
<?php include "footer.php"?>



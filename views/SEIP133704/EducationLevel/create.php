<?php
    include "header.php";
    use App\Bitm\SEIP133704\EducationLevel\Education;
    use App\Bitm\SEIP133704\EducationLevel\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;


?>
<title>
    <?php echo Uses::siteKeyword()  ?>
</title>
<div class="container ">
    <div class="container-fluid " style="margin-bottom: 120px; margin-top: 50px">
        <form class="form-group form-inline" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 50px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container">
            <label for="name">Name: </label>
            <input id="name" type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="container-fluid" style="margin-top: 20px">
            <label for="radio" >Select one: </label>
                    <div class="radio col-sm-12 ">
                        <label><input type="radio" name="level" value="Primary Education">Primary Education</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Junior School Certificate(J.S.C)">Junior School Certificate(J.S.C)</label>
                    </div>
                    <div class="radio col-sm-12 ">
                        <label><input type="radio" name="level" value="Secondary School Certificate(S.S.C)" >Secondary School Certificate(S.S.C)</label>
                    </div>
                    <div class="radio col-sm-12 ">
                        <label><input type="radio" name="level" value="Higher Secondary Certificate(H.S.C)" >Higher Secondary Certificate(H.S.C)</label>
                    </div>
                    <div class="radio col-sm-12 ">
                        <label><input type="radio" name="level" value="B.S.C/B.A/B.B.A" >B.S.C/B.A/B.B.A</label>
                    </div>
                    <div class="radio col-sm-12 ">
                        <label><input type="radio" name="level" value="M.S.C/M.A/M.B.A" >M.S.C/M.A/M.B.A</label>
                    </div>
                    <div class="radio col-sm-12">
                        <label><input type="radio" name="level" value="Phd." >Phd.</label>
                    </div>
                <div class="container col-sm-12" style="padding-left: 200px">
                    <button type="submit" class="btn btn-success">SUBMIT</button>

                </div>

            </div>




        </form>
    </div>
</div>
<?php include "footer.php"?>


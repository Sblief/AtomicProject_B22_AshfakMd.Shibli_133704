<?php
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Uses;
    use App\Bitm\SEIP133704\Hobby\Hobby;

    //$create = new Hobby();
    //echo $create->create();

?>


<div class="container" style="margin-top: 100px">
    <h2>Select your hobby</h2>

    <form role="form" method="post" action="store.php">
        <div class="checkbox">
            <label><input type="checkbox" name=hobby[] value="Cricket">Playing Cricket</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name=hobby[] value="Playing Football">Playing Football</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name=hobby[] value="Coding" >Coding</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name=hobby[] value="Vollyball">Vollyball</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name=hobby[] value="Swimming">Swimming</label>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

<?php  include "footer.php"?>



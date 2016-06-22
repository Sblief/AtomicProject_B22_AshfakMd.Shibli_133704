<?php
    include_once ("../../../vendor/autoload.php");
    include "header.php";
    use App\Bitm\SEIP133704\BookTitle\Uses;
    use App\Bitm\SEIP133704\Hobby\Hobby;

    //$create = new Hobby();
    //echo $create->create();

?>


<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <h2>Select your hobby</h2>

    <form role="form" method="post" action="store.php">
        <div>
            <label for="user">User Name</label>
            <input type="text" name="name" placeholder="Enter your name">
        </div>
        <div class="container-fluid">
       <label>Tick on your hobbies</label>
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
        <button class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

<?php  include "footer.php"?>



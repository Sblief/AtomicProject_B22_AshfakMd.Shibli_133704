<?php
    include_once ("../../../vendor/autoload.php");
    include ('header.php');
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;

$profilePicture= new Picture();
$singleInfo=$profilePicture->prepare($_GET)->view();
?>
<title>
    <?php Uses::siteName() ?>
</title>
<div class="container" style="margin-bottom: 250px; margin-top: 100px">
    <div class="container-fluid col-sm-6" >

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php" enctype="multipart/form-data">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php Uses::siteKeyword() ?>
            </h2>
            <input type="hidden" name="bringBackPage" id="bringBackPage" value="<?php echo $_GET['bringBackPage']?>">
            <input type="hidden" name="id" value="<?php echo $singleInfo->id?>">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $singleInfo->name?>"  required>
            </div>
            <div class="form-group">
                <label for="pwd">Upload your new profile picture:</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="container"  >
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <div class="container-fluid col-sm-6">
        <label for="img">Old Image</label>
        <img src="../../../resource/images/<?php echo $singleInfo->images?>" width="400px" height="400px" >
    </div>

</div>



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
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php" enctype="multipart/form-data">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php Uses::siteKeyword() ?>
            </h2>
            <input type="hidden" name="id" value="<?php echo $singleInfo->id?>">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $singleInfo->name?>"  required>
            </div>
            <div class="form-group">
                <label for="pwd">Upload your profile picture:</label>
                <input type="file" name="image" class="form-control" >
                <div class="container-fluid">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                <div class="container">
                    <label>Old Image</label>
                    <img src="../../../resource/images/<?php echo $singleInfo->images?>"  >
                </div>

            </div>


        </form>
    </div>

</div>



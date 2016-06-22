<?php
    include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\Profile\Picture;
use App\Bitm\SEIP133704\Profile\Uses;

$profile_picture= new Picture();
$single_info=$profile_picture->prepare($_GET)->view();
?>
<?php include "header.php" ?>
<title>
    Book
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php Uses::siteKeyword() ?>
            </h2>
            <input type="hidden" name="id" value="<?php echo $single_info->id?>">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control"name="name" value="<?php echo $single_info->name?>" >
            </div>
            <div class="form-group">
                <label for="pwd">Upload your profile picture:</label>
                <input type="file" name="image" class="form-control">
                <img src="../../../Resources/Images/<?php echo $single_info->images?>"
            </div>
            <input type="submit" value="Update">

        </form>
    </div>
</div>
<?php include "footer.php"?>


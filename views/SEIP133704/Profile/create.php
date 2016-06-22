<?php
    include "header.php";
    use App\Bitm\SEIP133704\Profile\Picture;
    use App\Bitm\SEIP133704\Profile\Uses;


?>
<title>
    <?php echo Uses::siteKeyword()  ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="store.php" enctype="multipart/form-data">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Upload <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="user">User Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <label for="pwd">Upload Your <?php echo Uses::siteKeyword()  ?></label>
                    <input type="file" class="form-control" id="title" name="image">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
<?php include "footer.php"?>


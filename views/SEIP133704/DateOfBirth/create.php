<?php
    include "header.php";
    use App\Bitm\SEIP133704\DateOfBirth\Birthday;
    use App\Bitm\SEIP133704\DateOfBirth\Uses;
    use App\Bitm\SEIP133704\GlobalClasses\Message;
    use App\Bitm\SEIP133704\GlobalClasses\Utility;


?>
<title>
    <?php echo Uses::siteKeyword()  ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px;">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="store.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Enter <?php echo Uses::siteKeyword()  ?>

            </h2>
            <div class="container-fluid">

                <div class="col-sm-6">
                    <label class="control-label">Enter your name</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Enter Your Name" required>
                    <label for="datepicker" class="control-label"><?php echo Uses::siteKeyword() ?></label>
                    <input type="text" id="datepicker" name="birthday" placeholder="dd-MM-yyyy" required>
                    <button  type="submit" class="btn btn-success col-sm-offset-10">Submit</button>
                </div>
                
            </div>
        </form>
    </div>
</div>
<?php include "footer.php"?>

<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'dd-MM-yy', changeMonth: true,
            changeYear: true, yearRange: "1930:2016"  }).val();
    });
</script>
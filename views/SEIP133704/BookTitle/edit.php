<?php
    include_once ("../../../vendor/autoload.php"); //Autoload file included to recognize namespace
    include "header.php" ;  // Made header as a separate file as it will be used in every page
    use App\Bitm\SEIP133704\BookTitle\Book;
    use App\Bitm\SEIP133704\BookTitle\Uses;  //Called the class files used here.

    $edit = new Book();  // Made an object of class
    $edit->prepare($_GET); // called prepare method of the class to prepare what in the argument
    $singleItem = $edit->view(); // called view method of the class. Assigned the return value from the method in a variable to use later.
?>

<title>
   <?php echo Uses::siteName() ?>
</title>
<div class="container">
    <div class="container-fluid" style="margin-bottom: 250px; margin-top: 100px">

        <form class="form-horizontal" role="form" method="post" style="margin-top: 100px" action="update.php">
            <h2 style="padding-left: 80px; margin-bottom: 20px">
                Edit Your <?php echo Uses::siteKeyword() ?>
            </h2>
            <div class="form-group">
                <label class="control-label col-sm-2"><?php echo Uses::siteKeyword() ?></label>
                <div class="col-sm-6">
                    <input type="hidden" name="bringBackPage" id="bringBackPage" value="<?php echo $_GET['bringBackPage']?>">
                    <input type="hidden" name="id" id="title" value="<?php echo $singleItem->ID ?>">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter <?php echo Uses::siteKeyword() ?>" value="<?php echo $singleItem->bookTitle ?>" required>
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


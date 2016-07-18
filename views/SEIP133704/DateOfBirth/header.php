<?php
    include_once ('../../../vendor/autoload.php');
use App\Bitm\SEIP133704\DateOfBirth\Birthday;
use App\Bitm\SEIP133704\DateOfBirth\Uses;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\GlobalClasses\Utility;

$showID1 = "Name";
$showID2 = "Birthday";

$id1 = "name";
$id2 = "resource";

$name1 = strtolower($id1)."Filter";
$name2 = strtolower($id2)."Filter";

$newIndex =  new Birthday();
$available = $newIndex->getAllFirstSearch();
$array = implode('","',$available);
$comaSeparated = '"'.$array.'"';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="../../../resource/CustomDesign/css/style.css">
    <script src="../../../resource/jquery/1.12.0/jquery.min.js"></script>
    <script src="../../../resource/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="../../../resource/bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <script src="../../../resource/jquery/1.12.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../../resource/font-awesome-4.6.3/css/font-awesome.min.css">


    <title><?php echo Uses::siteName() ?></title>

</head>


<body>
<!--Navigation Bar start-->
<nav role="navigation" class="navbar navbar-fixed-top atomic" style="height: 20px" >
    <div class="container" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar1">
            <ul class="nav navbar-nav navbar-left nav-tabs">
                <li><a href="../../../index.php">ATOMIC PROJECT HOME</a></li>
                <li ><a href="../BookTitle">1.Text</a></li>
                <li class="active"><a href="../DateOfBirth">2.Date</a></li>
                <li><a href="../OrganizationSummary">3.Textarea</a></li>
                <li><a href="../NewsLetter">4.Email</a></li>
                <li><a href="../Profile">5.File</a></li>
                <li><a href="../EducationLevel">6.Radio</a></li>
                <li><a href="../Hobby">7.Multiple Checkbox</a></li>
                <li><a href="../City">8.Select</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--Navigation bar end-->
<!--Navigation Bar start-->
<nav role="navigation" class="navbar navbar-default navbar-fixed-top" style="margin-top: 24px">
    <div class="container" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php  echo Uses::siteName() ?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">HOME</a></li>
                <li><a href="create.php">ADD</a></li>
                <li><a href="trashed.php">TRASH</a></li>
            </ul>
            <!--            Search area                    -->
            <form method="get" action="search.php">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <div class="checkbox">
                            <label><input class="checkbox" type="checkbox" id="<?php echo $id1 ?>" name="<?php echo $name1 ?>">In <?php echo $showID1 ?></label>

                            <label><input class="checkbox" type="checkbox" id="<?php echo $id2 ?>" name="<?php echo $name2 ?>">In <?php echo $showID2 ?></label>
                        </div>
                    </li>
                    <li>
                        <div class="has-feedback">
                            <input class="input-lg" type="text" id="search" name="search" placeholder="Search" required>
                            <span class="fa fa-search form-control-feedback"></span>
                        </div>
                    </li>
                </ul>
            </form>
            <!--            Search area         -->
        </div>
    </div>
</nav>
<!--Navigation bar end-->
<script>
    $(function() {
        $('#search').change(function() {
            this.form.submit();
        });
    });
</script>
<script>
    $( function() {
        var availableTags = [
            <?php echo $comaSeparated ?>
        ];
        $( "#search" ).autocomplete({
            source: availableTags
        });
    } );
</script>
</body>

</html>
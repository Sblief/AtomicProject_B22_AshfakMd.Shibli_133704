<?php
    include_once ('../../../vendor/autoload.php');
    use App\Bitm\SEIP133704\EducationLevel\Uses;
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
    <script src="../../../resource/jquery/jquery-3.0.0.min.js"></script>
    <script src="../../../resource/bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <script src="../../../resource/jquery/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="../../../resource/font-awesome-4.6.3/css/font-awesome.min.css">

    <title><?php echo Uses::siteName() ?></title>

</head>

<body>
<!--Navigation Bar start-->
<nav role="navigation" class="navbar navbar-fixed-top atomic" style="height: 20px">
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
                <li><a href="../BookTitle">1.Text</a></li>
                <li><a href="../DateOfBirth">2.Date</a></li>
                <li><a href="../OrganizationSummary">3.Textarea</a></li>
                <li><a href="../NewsLetter">4.Email</a></li>
                <li><a href="../Profile">5.File</a></li>
                <li class="active"><a href="../EducationLevel">6.Radio</a></li>
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
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php echo Uses::siteName() ?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">HOME</a></li>
                <li><a href="create.php">ADD</a></li>
                <li><a href="trashed.php">TRASH</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--Navigation bar end-->
</body>


</html>
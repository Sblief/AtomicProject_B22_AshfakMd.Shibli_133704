<?php
    include_once ('../../../vendor/autoload.php');
    use App\Bitm\SEIP133704\Profile\Uses;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/CustomDesign/css/style.css">
    <script src="../../../resource/bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <script src="../../../resource/jquery/jquery-3.0.0.min.js"></script>
    <title><?php Uses::siteName() ?></title>

</head>

<body >
<!--Navigation Bar start-->
<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php Uses::siteName() ?></a>
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
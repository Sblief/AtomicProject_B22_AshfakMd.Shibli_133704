<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../resource/bootstrap-3.3.6/css/bootstrap.min.css">
        <script src="../../../resource/bootstrap-3.3.6/js/bootstrap.min.js"></script>
        <script src="../../../resource/jquery/jquery-3.0.0.min.js"></script>
</head>
    <title>Book Library</title>
    <style>
        body {
            font: 400 15px Parisienne, cursive;
            line-height: 1.8;
            color: #818181;
        }
        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;
        }
        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }
        .container-fluid {
            padding: 27px -1px;
        }
        .bg-grey {
            background-color: #f1f6b0;
        }


        .navbar {
            margin-bottom: 0;
            background-color: #39554d;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }
        .navbar li a, .navbar .navbar-brand {
            color: #fff !important;
        }
        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #a660ff !important;
            background-color: #fff !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }


    </style>
</head>

<body>
<div class="container">
    <!--Navigation Bar start-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Book Library</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="create.php">ADD</a></li>
                    <li><a href="trashed.php">TRASH</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Navigation bar end-->
</div>
</body>

</html>
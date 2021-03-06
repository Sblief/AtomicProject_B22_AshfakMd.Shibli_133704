<?php
include_once ("../../../vendor/autoload.php");
use App\Bitm\SEIP133704\NewsLetter\Email;
use App\Bitm\SEIP133704\GlobalClasses\Utility;
use App\Bitm\SEIP133704\GlobalClasses\Message;
use App\Bitm\SEIP133704\NewsLetter\Uses;

if (isset($_POST['receiverName'])) {
    $name = $_POST['receiverName'];
    $email = $_POST['receiverEmail'];
}

$newMail = new Email();
if(!empty($_POST['id'])) {
    $newMail->prepare($_POST);
    $singleItem = $newMail->view();

    $id = $singleItem->ID;
    $itemName = $singleItem->name;
    $itemData = $singleItem->email_address;


    $tableColumn = array("SL","ID","Name","Email Addresses","","");
    $title =  Uses::siteName();
    $keyword =  Uses::siteKeyword();



$html = <<<ATOMIC
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Really Simple HTML Email Template</title>
    <style>
        /* -------------------------------------
            GLOBAL
        ------------------------------------- */
        * {
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            font-size: 100%;
            line-height: 1.6em;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 600px;
            width: auto;
        }

        body {
            -webkit-font-smoothing: antialiased;
            height: 100%;
            -webkit-text-size-adjust: none;
            width: 100% !important;
        }


        /* -------------------------------------
            ELEMENTS
        ------------------------------------- */
        a {
            color: #348eda;
        }

        .btn-primary {
            Margin-bottom: 10px;
            width: auto !important;
        }

        .btn-primary td {
            background-color: #348eda;
            border-radius: 25px;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-size: 14px;
            text-align: center;
            vertical-align: top;
        }

        .btn-primary td a {
            background-color: #348eda;
            border: solid 1px #348eda;
            border-radius: 25px;
            border-width: 10px 20px;
            display: inline-block;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            line-height: 2;
            text-decoration: none;
        }

        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .padding {
            padding: 10px 0;
        }


        /* -------------------------------------
            BODY
        ------------------------------------- */
        table.body-wrap {
            padding: 20px;
            width: 100%;
        }

        table.body-wrap .container {
            border: 1px solid #f0f0f0;
        }


        /* -------------------------------------
            FOOTER
        ------------------------------------- */
        table.footer-wrap {
            clear: both !important;
            width: 100%;
        }

        .footer-wrap .container p {
            color: #666666;
            font-size: 12px;

        }

        table.footer-wrap a {
            color: #999999;
        }


        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3 {
            color: #111111;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: 200;
            line-height: 1.2em;
            margin: 40px 0 10px;
        }

        h1 {
            font-size: 36px;
        }
        h2 {
            font-size: 28px;
        }
        h3 {
            font-size: 22px;
        }

        p,
        ul,
        ol {
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 10px;
        }

        ul li,
        ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        /* ---------------------------------------------------
            RESPONSIVENESS
        ------------------------------------------------------ */

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            clear: both !important;
            display: block !important;
            Margin: 0 auto !important;
            max-width: 600px !important;
        }

        /* Set the padding on the td rather than the div for Outlook compatibility */
        .body-wrap .container {
            padding: 20px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            display: block;
            margin: 0 auto;
            max-width: 600px;
        }

        /* Let's make sure tables in the content area are 100% wide */
        .content table {
            width: 100%;
        }

    </style>
</head>

<body bgcolor="#f6f6f6">

<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td>
                            <p>Hi there, $itemName ($itemData) </p>
                            <p>We are here to serve you</p>
                            <h1>Allways Customer safety first</h1>
                            <p>This is a really simple email template. Its sole purpose is to get you to click the button below.</p>
                            <h2>How do I use it?</h2>
                            <p>All the information you need is on GitHub.</p>
                            <!-- button -->
                            <table class="btn-primary" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td>
                                        <a href="http://atomicproject.shibliemon.com/">View Our Website</a>
                                    </td>
                                </tr>
                            </table>
                            <!-- /button -->
                            <p>Feel free to use, copy, modify this email template as you wish.</p>
                            <p>Thanks, have a lovely day.</p>
                            <p><a href="http://fb.com/shibli.emon">Follow Us on facebook</a></p>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->

        </td>
        <td></td>
    </tr>
</table>
<!-- /body -->

<!-- footer -->
<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">

            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td align="center">
                            <p>Don't like these annoying emails? <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->

        </td>
        <td></td>
    </tr>
</table>
<!-- /footer -->
<footer class="text-center">
            <p>&copy; Copyright Ashfak Md. Shibli & Atomic Projects 2016</p>
    </footer>

</body>
</html>

ATOMIC;


}
else {
    $allItems = $newMail->index();



    $tableColumn = array("SL","ID","Name","Email Addresses","","");
$title =  Uses::siteName();
$keyword =  Uses::siteKeyword();


$tableDynamicData = "";
$sl = 0;


foreach ($allItems as $item ):
    $sl++;

    $tableDynamicData .= "<tr>";
    $tableDynamicData .= "<td>$sl</td>";
    $tableDynamicData .= "<td>$item->ID</td>";
    $tableDynamicData .= "<td>$item->name</td>";
    $tableDynamicData .= "<td>$item->email_address</td>";
    $tableDynamicData .= "</tr>";

endforeach;




$html = <<<ATOMIC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/CustomDesign/css/style.css">
    <script src="../../../resource/jquery/1.12.0/jquery.min.js"></script>
    <script src="../../../resource/bootstrap-3.3.6/js/bootstrap.min.js"></script>

    <title>$title</title>

</head>
<body>
<center><h1>$title</h1></center>
<div>
<h2>$keyword List</h2>
<table class="table table-bordered table-responsive table-hover" >

        <thead>
        <tr>
<!--            table heads are taken from array-->
            <th>$tableColumn[0]</th>
            <th>$tableColumn[1]</th>
            <th>$tableColumn[2]</th>
            <th>$tableColumn[3]</th>
            
        </tr>
        </thead>
        <tbody>
         $tableDynamicData

        </tbody>
    </table>
   
    <footer class="text-center">
            <p>&copy; Copyright Ashfak Md. Shibli & Atomic Projects 2016</p>
    </footer>
    </div>

</body>

</html>


ATOMIC;
}
include_once ('../../../vendor/phpmailer/phpmailer/class.phpmailer.php');

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug =0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "sblief.sb@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "emON#744254";
//Set who the message is to be sent from
$mail->setFrom('atomicproject@shibliemon.com', 'Ashfak Md. Shibli');
//Set an alternative reply-to address
$mail->addReplyTo('shibli.emon@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($email, $name);
//Set the subject line
$mail->Subject = $title;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

$file = fopen("newsletter.html","w");
fwrite($file,$html);
fclose($file);
$mail->msgHTML(file_get_contents('newsletter.html'), dirname(__FILE__));
//$mail->Body= $html;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo Message::message("Mailer Error: " . $mail->ErrorInfo);
    Utility::redirect('index.php');
} else {
    echo Message::message("
                        <div id=\"message\" class=\"alert alert-info\">
                                <strong>Successfully Sent email!</strong> 
                        </div>
                        <script>
                            $('#message').show().delay(2000).fadeOut();
                        </script>");
    Utility::redirect('index.php');
}
?>
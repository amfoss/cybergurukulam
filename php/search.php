<!DOCTYPE html>
<html>

<script src="../js/forms.js"></script>
<head>
    <title>Admin Login: Log In</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <style>
        #keyinfo {
            text-align: center;
        }
    </style>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42366838-3', 'auto');
        ga('send', 'pageview')
    </script>
    <script type="text/javascript">
        var verifyCallback = function(response) {
            alert(response);
        };
        var widgetId1;
        var widgetId2;
        var CaptchaCallback = function(){
            widgetId1 = grecaptcha.render('RecaptchaField1', {
                'sitekey' : '6LcfOAQTAAAAAMulh0UTBQczBLN6lLT-FtUz2_TY'
            });
            widgetId2 = grecaptcha.render('RecaptchaField2', {
                'sitekey' : '6LcfOAQTAAAAAMulh0UTBQczBLN6lLT-FtUz2_TY'
            });
        };
    </script>
    <script src="js/smooth-scroll.js"></script>
    <script>
        smoothScroll.init({
            speed: 1000
        } );
    </script>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 16/7/15
 * Time: 3:46 PM
 */

include_once 'functions.php';
include_once 'register.php';
//Check whether logged in or not
sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
//Connect to the DB
$mysqli = establishConnections();


$name = mysql_real_escape_string( $_POST['name']);
$email = mysql_real_escape_string( $_POST['email']);
$phone = mysql_real_escape_string( $_POST['phone']);
$dob = mysql_real_escape_string( $_POST['dob'] );
$school = mysql_real_escape_string( $_POST['school'] );
$city = mysql_real_escape_string( $_POST['city'] );
$address= mysql_real_escape_string( $_POST['address'] );
$paddress = mysql_real_escape_string( $_POST['paddress'] );
$standard = mysql_real_escape_string( $_POST['standard'] );

$resultset = searchrec($name,$email,$phone,$dob,$school,$city,$address,$paddress,$standard);

//Store the result

// Display it in the html page
?>
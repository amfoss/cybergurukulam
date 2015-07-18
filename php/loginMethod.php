<!DOCTYPE html>
<html>

<script src="../js/forms.js"></script>
<head>
    <title>Admin Login: Log In</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="../css/ie/html5shiv.js"></script><![endif]-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/skel.min.js"></script>
    <script src="../js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="../css/skel.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/style-wide.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="../css/ie/v8.css" /><![endif]-->
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
 * Date: 6/7/15
 * Time: 1:54 PM
 */

include_once 'functions.php';
include_once 'register.php';

//include '../js/forms.js';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
//$mysqli = establishConnections();

//header('Location: '.'/../php/success.html');



$mysqli = connect_db();
if(!$mysqli){
    header('Location: '.'error.php');
    return;
}

$password = formhash(this.form, this.form.password);

if(login(this.form.email, $password, $mysqli)) {
    header('Location: '.'protected_page.php');
}

if (login_check($mysqli) == true) {
    echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

    echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
} else {
    echo '<p>Currently logged ' . $logged . '.</p>';
    echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
}

mysql_close( $mysqli );

?>

</html>
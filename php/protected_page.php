<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 15/7/15
 * Time: 8:48 AM
 */
include_once 'access.php';
include_once 'includes/functions.php';
// include_once 'includes/db_connect.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reports </title>
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
    <script src="//www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
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
</head>

<body>
<?php if (login_check($mysqli) == true) : ?>
    <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
    <p>
        This is a protected page.  To access this page, users
        must be logged in.  You can access reports here.
    </p>
    <p>Return to <a href="../login.html">login page</a></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../login.html">login</a>
    </p>
<?php endif; ?>



</body>
</html>
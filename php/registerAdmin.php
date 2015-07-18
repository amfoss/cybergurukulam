<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 17/7/15
 * Time: 5:07 PM
 */
include_once 'register.inc.php';
include_once 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Registration Form</title>
    <script type="text/JavaScript" src="../js/sha512.js"></script>
    <script type="text/JavaScript" src="../js/forms.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
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
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
</head>
<body>
<!-- Registration form to be output if the POST variables are not
set or if the registration script caused an error. -->
<h1>Register with us</h1>
<?php
if (!empty($error_msg)) {
    echo $error_msg;
}
?>
<ul>
    <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
    <li>Emails must have a valid email format</li>
    <li>Passwords must be at least 6 characters long</li>
    <li>Passwords must contain
        <ul>
            <li>At least one uppercase letter (A..Z)</li>
            <li>At least one lower case letter (a..z)</li>
            <li>At least one number (0..9)</li>
        </ul>
    </li>
    <li>Your password and confirmation must match exactly</li>
</ul>
<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
      method="post"
      name="registration_form">
    Username: <input type='text'
                     name='username'
                     id='username' /><br>
    Email: <input type="text" name="email" id="email" /><br>
    Password: <input type="password"
                     name="password"
                     id="password"/><br>
    Confirm password: <input type="password"
                             name="confirmpwd"
                             id="confirmpwd" /><br>
    <input type="button"
           value="Register"
           onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
</form>
<p>Return to the <a href="../login.html">login page</a>.</p>
</body>
</html>
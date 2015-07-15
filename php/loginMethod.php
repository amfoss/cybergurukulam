<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Error</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-wide.css" />
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 6/7/15
 * Time: 1:54 PM
 */

include_once 'access.php';
include_once 'functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}

formhash(this.form, this.form.password);

if (login_check($mysqli) == true) {
    echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

    echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
} else {
    echo '<p>Currently logged ' . $logged . '.</p>';
    echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
}
?>



<h1>There was a problem</h1>
<p class="error"><?php echo $error; ?></p>
</body>
</html>
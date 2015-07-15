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
    <meta charset="UTF-8">
    <title>Secure Login: Reports</title>
    <link rel="stylesheet" href="styles/main.css" />
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
    <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
    <p>
        This is a protected page.  To access this page, users
        must be logged in.  You can access reports here.
    </p>
    <p>Return to <a href="login.html">login page</a></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="login.html">login</a>.
    </p>
<?php endif; ?>
</body>
</html>
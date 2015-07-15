<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 15/7/15
 * Time: 8:48 AM
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

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
        This is an example protected page.  To access this page, users
        must be logged in.  At some stage, we'll also check the role of
        the user, so pages will be able to determine the type of user
        authorised to access the page.
    </p>
    <p>Return to <a href="login.html">login page</a></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="login.html">login</a>.
    </p>
<?php endif; ?>
</body>
</html>
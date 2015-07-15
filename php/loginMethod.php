<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 6/7/15
 * Time: 1:54 PM
 */

include_once 'functions.php';
include_once '../js/forms.js';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
$mysqli = connect_db();
$password = formhash(this.form, this.form.password);
if(login(this.form.email, $password, $mysqli))
{
    header('Location: '.'/../php/protected_page.php');
}

if (login_check($mysqli) == true) {
    echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

    echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
} else {
    echo '<p>Currently logged ' . $logged . '.</p>';
    echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
}
?>
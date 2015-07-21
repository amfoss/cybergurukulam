/**
* Created by PhpStorm.
* User: rishi
* Date: 6/7/15
* Time: 1:54 PM
*/

<!-- <!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <title>Secure Login: Registration Form</title>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
</head>

<body bgcolor="#5f9ea0" >

<form action="php/loginMethod.php" method="post" name="login"></form>
<br><br><br><br>

<table width = '25%'>
    <tr height = 50 >
        <td> <label for="email">Email:</label></td>
        <td><input type="text" name="email" id="email" value="" >  </td>
    </tr>
    <tr height = 50>
        <td><label for="password">Password:</label></td>
        <td><input type="password" name="password" id="password" value=""> </td>
    </tr>
    <tr height = 50>
        <td>  </td>
        <td><input type="submit" value="login" onclick="location.href='/php/loginMethod.php';" /> <input type="button" value="Register" onclick="location.href='/php/registerAdmin.php';" /></td>
    </tr>
</table>

<!-- ?php

/*
include_once 'functions.php';
include_once 'register.php';

//include '../js/forms.js';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if (isset($_POST['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
$mysqli = establishConnections();
//$mysqli = connect_db();
if(!$mysqli){
    header('Location: '.'error.php');
    return;
}
else{echo "connected!....";}

$password = formhash(this.form, this.form.password);

if(login(this.form.email, $password, $mysqli)) {
    header('Location: '.'protected_page.php');
}

if (login_check($mysqli) == true) {
    echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

    echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
} else {
    echo '<p>Currently logged ' . $logged . '.</p>';
    echo "<p>If you don't have a login, please <a href='registerAdmin.php'>register</a></p>";
}

mysql_close( $mysqli );

?>
</form>

</body>
</html>
-->

*/

<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
//include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Login: Log In</title>
   <!--  <link rel="stylesheet" href="styles/main.css" /> -->
    <script type="text/JavaScript" src="../js/sha512.js"></script>
    <script type="text/JavaScript" src="../js/forms.js"></script>
</head>
<body>
<?php
if (isset($_POST['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<form action="includes/process_login.php" method="post" name="login_form">
    <br><br><br><br>

    <table width = '25%'>
        <tr height = 50 >
            <td> <label for="email">Email:</label></td>
            <td><input type="text" name="email" id="email" value="" >  </td>
        </tr>
        <tr height = 50>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="password" id="password" value=""> </td>
        </tr>
        <tr height = 50>
            <td>  </td>
            <td><input type="button" value="login" onclick="formhash(this.form, this.form.password);" /> <input type="button" value="Register" onclick="location.href='/php/registerAdmin.php';" /></td>
        </tr>
    </table>
</form>
<p>If you don't have a login, please <a href="register.php">register</a></p>
<p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
<p>You are currently logged <?php echo $logged ?>.</p>
</body>
</html>
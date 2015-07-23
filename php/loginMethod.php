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
//include_once 'includes/db_connect.php'; "#add8e6"
include_once 'functions.php';
include_once 'access.php';
//sec_session_start();
connect_db();
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
<body bgcolor="#f0ffff">
<?php
if (isset($_POST['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<form action="process_login.php" method="post" name="login_form" >
    <br><br><br><br>

    <table width = '25%'>
        <tr height = 50 bgcolor="#5f9ea0">
            <td> <label for="email">EMAIL</label></td>
            <td><input type="text" name="email" id="email" value="" height="30">  </td>
        </tr>
        <tr height = 50  bgcolor="#8fbc8f">
            <td><label for="password">PASSWORD</label></td>
            <td><input type="password" name="password" id="password" value=""> </td>
        </tr>
        <tr height = 50 bgcolor="white">
            <td>  </td>
            <td><input type="submit" value="LOGIN" onfocus="formhash(this.form, this.form.password);" /> <input type="button" value="REGISTER" onclick="location.href='/registerAdmin.php';" /></td>
        </tr>
    </table>
</form>
<!--
<p>If you don't have a login, please <a href="registerAdmin.php">register</a></p>
<p>If you are done, please <a href="logout.php">log out</a>.</p> -->
</body>
</html>
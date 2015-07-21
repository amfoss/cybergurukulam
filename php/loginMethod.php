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
<p>If you don't have a login, please <a href="registerAdmin.php">register</a></p>
<p>If you are done, please <a href="logout.php">log out</a>.</p>
<p>You are currently logged <?php echo $logged ?>.</p>
</body>
</html>
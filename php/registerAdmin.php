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
    <link rel="stylesheet" href="styles/main.css" />
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
<p>Return to the <a href="index.php">login page</a>.</p>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 9/7/15
 * Time: 3:37 PM
 */

//include_once 'db_connect.php';
include_once 'access.php';
include_once 'functions.php';
include_once 'register.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // The hashed password.
    echo($password);
    if (login($email, $password, $mysqli) == true) {
        // Login success
        header('Location: protected_page.php');
    } else {
        // Login failed
        header('Location: error.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}
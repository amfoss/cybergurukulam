<?php
/**
 * Created by PhpStorm.
 * User: rishi
 * Date: 15/7/15
 * Time: 9:02 AM
 */

$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Oops! An unknown error.';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Error</title>
    <link rel="stylesheet" href="styles/main.css" />
</head>
<body>
<h1>There was a problem</h1>
<p class="error"><?php echo $error; ?></p>
</body>
</html>
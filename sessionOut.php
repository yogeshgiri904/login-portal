<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting...</title>
</head>
<body>
<?php
    session_start();
    session_unset();
    session_destroy();
    echo "You have been logged out";
    echo "<br>Redirecting to login page...";
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEQIP HomePage</title>
</head>
<body>
    <form action="index.php" method="get">
        <button name="login-button">Login</button>
        <button name="register-button">Register</button>
    </form>
</body>
</html>


<?php
    if(isset($_GET['login-button']))
    {
        header("Location: Login/login.php");
        exit();
    }
    else if(isset($_GET['register-button']))
    {
        header("Location: Registration/register.php");
        exit();
    }
?>
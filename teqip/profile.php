<?php
    session_start();

    if(isset($_SESSION['userid']))
    {
        echo "Welcome to Profile page";
    }
    else
    {
        header("Location: /Login/login.php");
        exit();
    }
?>
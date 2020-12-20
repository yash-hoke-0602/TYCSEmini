<?php
    require "../includes/db.php";
    
    session_start();
    if(isset($_POST['verify-button']))
    {
        if($_POST['user-otp']==$_SESSION['otp'])
        {
            $sql="INSERT INTO users (emailid,userpwd,usertype) VALUES (?,?,?);";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: register.php?error=sqlerror");
                exit();
            }
            else
            {
                $usertype="student";
                mysqli_stmt_bind_param($stmt,"sss",$_SESSION['userEmail'],$_SESSION['userPWD'],$usertype);
                mysqli_stmt_execute($stmt);
                echo "Registered Successfully";
            }

            session_unset();
            session_destroy();
        }
        else
        {
            header("Location: newuser.php?error=OTPmismatch");
            exit();
        }
    }
    else
    {
        session_unset();
        session_destroy();
        header("Location :register.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="../Login/login.php"><button>Login</button></a>
</body>
</html>
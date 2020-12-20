<?php
    if(isset($_POST['login-button']))
    {
        session_start();
        //already logged in
        if(isset($_SESSION['userid']))
        {
            header("Location: ../home.php");
            exit();
        }
        require "../includes/db.php";
        $user=$_POST['email'];
        $pwd=$_POST['password'];

        $sql="SELECT * FROM users WHERE emailid=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$user);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result))
            {
                $pwdCheck=password_verify($pwd,$row['userpwd']);
                if($pwdCheck==false)
                {
                    header("Location:login.php?error=wrongpassword&email=$user");
                    exit();
                }
                else if($pwdCheck==true)
                {
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['email']=$row['emailid'];
                    $_SESSION['usertype']=$row['usertype'];
                    header("Location: ../home.php");
                    exit();
                }
                else
                {
                    header("Location:login.php?error=random");
                    exit();
                }
            }
            else
            {
                header("Location:login.php?error=invaliduser");
                exit();
            }
        }
    }
    else
    {
        header("Location: login.php");
        exit();
    }
?>
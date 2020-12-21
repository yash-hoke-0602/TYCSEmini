<?php
    require "../includes/db.php";

    if(isset($_POST['submit-button']))
    {
        $email=$_POST['email'];
        $pwd=$_POST['password'];
        $checkPwd=$_POST['re-password'];
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            header("Location: register.php?error=invalidemail");
            exit();
        }
        else
        {
            if(!(strpos($email,"@walchandsangli.ac.in")==true))
            {
                header("Location: register.php?error=invalidedomain");
                exit();
            }
            else
            {
                if(!($pwd == $checkPwd))
                {
                    header("Location: register.php?error=confirmpwd&email=$email");
                    exit();
                }
                else
                {
                    $sql="SELECT * FROM users WHERE emailid=?;";
                    $stmt=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: register.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"s",$email);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resCheck = mysqli_stmt_num_rows($stmt);
                        if($resCheck > 0)
                        {
                            header("Location: register.php?error=duplicateuser");
                            exit();
                        }
                        else
                        {
                            $hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);
                            session_start();
                            $generateotp = rand(100000,999999);
                            
                            $_SESSION['otp'] = $generateotp;
                            $_SESSION['userEmail']=$email;
                            $_SESSION['userPWD']=$hashedpwd;

                            $to_email = $email;
                            $subject = "OTP verification for TEQIP";
                            $body = "Your One Time Password Is:".$generateotp;
                            $headers = "From: yashhoke0602@gmail.com";

                            mail($to_email, $subject, $body, $headers); 
                        }        
                    }
                }
            }
        }
    
    }
    else if($_GET['error']=="OTPmismatch")
    {
        echo "<br>Wrong OTP</br>";
    }
    else
    {
        header("Location: register.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <form action="verify.php" method="post">
        <input type="text" name="user-otp" placeholder="Enter OTP" required>
        <br>
        <button name="verify-button">Verify</button>
        <br>
        <a href="register.php">register again</a>
    </form>
</body>
</html>
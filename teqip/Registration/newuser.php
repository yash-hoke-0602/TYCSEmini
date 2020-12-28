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
                     //check for existing user with same email
                    $sql="SELECT * FROM users WHERE emailid=?;";
                    $stmt=mysqli_stmt_init($conn);
                       //failed to execute
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
                            $headers = "From: teqipthree@gmail.com";

                            mail($to_email, $subject, $body, $headers); 
                        }        
                    }
                }
            }
        }
    
    }
    else if($_GET['error']=="OTPmismatch")
    {
        echo "<br><p><b>Wrong OTP</b></p><br>";
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
    <title>Verify</title>
    <style type="text/css">
                   .home {
  background-image: url('bg.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}
        #log{
   
    padding:60px 40px;
    -webkit-box-shadow: 0px 3px 66px 20px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 3px 66px 20px rgba(0,0,0,0.75);
box-shadow: 0px 3px 66px 20px rgba(0,0,0,0.75);

}
 #d{
    position: absolute;
top: 10px;
right: 10px;
color:black;
margin:10px;

 }
p{
        color:red;
     }
    </style>
</head>
<body class="home">
    <div class="container-fluid">
        <div class="row">
            <div clas="col-md-4 col-sm-4 col-xs-12"></div>
                     <div clas="col-md-4 col-sm-4 col-xs-12">
    <form action="verify.php" method="post" id="log">
         <div class="form-group">
        <input type="text" class="form-control" name="user-otp" placeholder="Enter OTP" required>
        <br>
        </div>
        <button name="verify-button" class="btn btn-success btn-block">Verify</button>
        <br>
        
    </form>
    <a href="register.php" ><button name="home-button" class="btn btn-success btn-block">register again</button></a>
</div>
</div>
</div>
<a href="http://localhost/teqip/index.php"id="d"><button name="home-button">Home</button></a>
</body>
</html>
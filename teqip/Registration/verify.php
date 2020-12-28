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
                echo "<p><b>Registered Successfully</b></p>";
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
   
    <title>Document</title>
    <style type="text/css">
        p{
            color:green;
        }
            #log{
   
    padding:60px 40px;
    -webkit-box-shadow: 0px 3px 66px 20px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 3px 66px 20px rgba(0,0,0,0.75);
box-shadow: 0px 3px 66px 20px rgba(0,0,0,0.75);

}
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
    </style>
</head>
<body class="home">
    <br>
     <div class="container-fluid">
        <div class="row">
            <div clas="col-md-4 col-sm-4 col-xs-12"></div>
                     <div clas="col-md-4 col-sm-4 col-xs-12">
                        <form action="../Login/login.php" id="log">
    <a href="../Login/login.php"><button name="login-button" class="btn btn-success btn-block">Login</button></a>
    </form>
    </div>
</div>
</div>
</body>
</html>
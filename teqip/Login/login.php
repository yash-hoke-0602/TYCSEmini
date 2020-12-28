<?php
    session_start();
    //if already logged in then go back to home page
    if(isset($_SESSION['userid']))
    {
        header("Location: ../home.php");
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
    <title>Login</title>
   
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
     img{
        width:150px;
        margin:auto;
          border-radius: 50%;
       padding: 10px;
       margin-left: 75px;
     }
     h1
     {
        color: white;
        text-align: center;
        font-weight: bolder;
        margin-top: -30px;
     }
     h4{
        color:white;
     }
     p{
        color:red;
     }
      #d{
    position: absolute;
top: 10px;
right: 10px;
color:black;
margin:10px;

 }
    </style>
</head>
<body class="home">
   
    <div class="container-fluid">
        <div class="row">
            <div clas="col-md-4 col-sm-4 col-xs-12"></div>
                     <div clas="col-md-4 col-sm-4 col-xs-12">
    <form action="loggeduser.php" method="post" id="log">
        
<h1>LOGIN TEQIP-III</h1>
<img class="img img-responsive "  src="login.jpg">
        <?php
            if(isset($_GET['error']))
            {
                if($_GET['error']=="invaliduser")
                {
                    echo "<p><b>email not found</b></p><br>";
                    echo ' <div class="form-group"><input type="text" name="email" class="form-control" placeholder="Enter Email" required ><audio autoplay><source src="ad.mp3" type="audio/mpeg"></audio></div>
                    <br>';
                }
                else if($_GET['error']=="wrongpassword")
                {
                    echo "<p><b>Please enter correct password</b></P><br>";
                    echo ' <div class="form-group"><input type="text" name="email" class="form-control"  placeholder="Enter Email" required value="'. $_GET['email'] . '" > <audio autoplay><source src="ad.mp3" type="audio/mpeg"></audio></div>
                    <br>';
                }

            }
            else
            {
                echo ' <div class="form-group"><input type="text" class="form-control" name="email" placeholder="Enter Email" required></div>
                <br>';
            }
        ?>
        <div class="form-group">
        <input type="password" class="form-control" size="35" name="password" placeholder="Enter Password" required></div>
        <br>
        <button name="login-button" class="btn btn-success btn-block">Login</button>

    </form>


       </div>
    </div>
</div>

<a href="../index.php"id="d"><button name="home-button">Home</button></a>

</body>
</html>


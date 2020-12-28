<?php
    session_start();
    session_unset();
    session_destroy();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
    <title>Register</title>
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
    <form action="newuser.php" method="post" id=log>
        <h1>Registration Form TEQIP-III</h1>
        <?php
            if(isset($_GET['error']))
            {
                if($_GET['error']=="invalidemail")
                {
                    echo "<br><p><b>Enter a valid email</b><p><br>";
                }
                else if($_GET['error']=="invalidedomain")
                {
                    echo "<br><p><b>Please Enter email of walchand domain</b></p><br>";
                }
                else if($_GET['error']=="duplicateuser")
                {
                    echo "<br><p><b>This email is already taken</b></p><br>";
                }
                if($_GET['error']=="confirmpwd")
                {
                    echo "<p><b>Your password and confirmation password do not match.</b></p><br>";
                    echo '<div class="form-group"><input type="text" name="email" class="form-control"  placeholder="Enter Email" required value='.$_GET['email'].'></div><br>';
                }
                else
                {
                    echo '<div class="form-group"><input type="text" name="email" class="form-control"  placeholder="Enter Email" required></div>
                    <br>';
                }
            }
            else
            {
                echo '<div class="form-group"><input type="text" name="email" class="form-control"  placeholder="Enter Email" required></div>
                <br>';
            }
        ?>
        <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
        <br>
        <input type="password" class="form-control" name="re-password" placeholder="Confirm Password" required>
        <br></div>
        <button name="submit-button" class="btn btn-success btn-block">Register</button>
        
    </form>
</div>
</div>
</div>
<a href="../index.php"id="d"><button name="home-button">Home</button></a>

</body>
</html>


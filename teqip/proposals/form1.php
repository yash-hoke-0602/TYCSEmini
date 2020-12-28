<?php
    session_start();
    if(!isset($_SESSION['userid']))
    {
        header("Location: Login/login.php");
        exit();
    }
    if(isset($_GET['error']) == "duplicateform")
    {
        echo "<br>You have already submitted this form<br>";
    }
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

  p{
        color:red;
     }
     label{
        color: white;
     }
    </style>
</head>
<body class="home">
    <div class="container-fluid">
        <div class="row">
            <div clas="col-md-4 col-sm-4 col-xs-12"></div>
                     <div clas="col-md-4 col-sm-4 col-xs-12">
    <form action="submit1.php" method="post" id="log">
        <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Enter full name">
        <br>
        <input type="text" class="form-control" name="address" placeholder="Enter full address">
        <br>
        <input type="text" class="form-control" name="college" placeholder="Enter college name">
        <br>
        <br>
        </div>
        <label for="sendoption">Send to</label>
        <select name="sendoption">
            <option value="admin1">admin1</option>
            <option value="faculty1">faculty1</option>
        </select>
        <br>
        <br>
        <br>
        <button name="submit-button" class="btn btn-success btn-block">Submit</button>
    </form>  
    </div>
</div>
</div>  
</body>
</html>
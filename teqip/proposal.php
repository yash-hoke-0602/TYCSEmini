<?php
    session_start();

    if(isset($_SESSION['userid']))
    {
        echo '<a href="proposals/form1.php"><button name="form1-button">Form No.1</button> </a><br><br><br>';
        echo '<a href="proposals/form2.php"><button name="form2-button">Form No.2</button> </a>';
        
    }
    else
    {
        header("Location: Login/login.php");
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
    <title>Proposal</title>
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
button:hover {
  background-color: red;

}

    </style>
</head>
<body class="home">

</body>
</html>
    
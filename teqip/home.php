<?php
    session_start();

    if(isset($_SESSION['userid']))
    {
        echo "<p>welcome</p>".$_SESSION['email'];
    }
    else
    {
        header("Location: Login/login.php");
        exit();
    }
      if($_SESSION['usertype']=="admin")
    {
        echo '<div class="s"><br><a href="proposals/administrator.php"><button name="check-button">Received Proposals</button> </a></div>';
        echo '<div class="k"><br><a href="proposals/approvedforms.php"><button name="check-button1">Approved Proposals</button> </a></div>';
        echo '<div class="l"><br><a href="proposals/rejectedforms.php"><button name="check-button2">Rejected Proposals</button> </a></div>';
    }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
       <link rel="stylesheet" href="style2.css">
    <title>Homepage</title>
    <style type="text/css">
         .home {
  background-image: url('bg.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
p{
    color: white;
}

.s button:hover
{
    background-color: green;
    color: white; 
}
.k button:hover
{
    background-color: green;
    color:white;
}
.l button:hover
{
    background-color: red;
    color: white;
}
.u { 
  position: relative; 
  width: 60px; 
} 
 
.u { 
  position: absolute; 
  top: 10px; 
  right: 10px; 
} 


    </style>

</head>
<body class="home">
<div class="wrapper">
    <div class="left">
        <img src="123.jpg" alt="Add you Pic Here" width="100">
        <h4>Name</h4>
         <?php
                        if($_SESSION['usertype']=="student")
                        {
                            echo '<p>Student</p>';
                        }
                        else
                            echo '<p>Admin</p>'
                        ?>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <a href="profile.php"><button name="profile-button">Profile</button> </a>
                 </div>
                
            </div>
        </div>
      
      <div class="projects">
            <h3>Things You Done</h3>
            <div class="projects_data">
                 
                 <div class="data">
                      <a href="proposal.php"><button name="proposal-button">proposals</button> </a>
                      <br>
                      <?php
                        if($_SESSION['usertype']=="student")
    {
        echo '<br><a href="proposals/formstatus.php"><button name="check-button3" align="right">Form status</button> </a>';
    }

                      ?>
              </div>
            </div>
        </div>
      
       
    </div>
</div>




 <div class="u">
    <form action="logout.php" method="get">
        <button name="logout-button">Logout</button>
    </form>
    </div>
  
    
</body>
</html>
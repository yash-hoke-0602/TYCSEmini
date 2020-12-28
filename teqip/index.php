<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEQIP HomePage</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
      <style>div {
  background-image: url('bg1.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;

}
.m
{
color:red;
}
.nav-link
{
    color:green;
}
h1,h2{
    color:green;
}
</style>
</head>
<body>
    <div class="home">
    
    
         
   
  
    <a href="http://www.walchandsangli.ac.in/"><h1>Walchand College Of Engineering,<br>Sangli-416415</h1></a>

    <a href="https://www.teqip.in/index.html"><h2>TEQIP-III</h2></a>
    <h3>TECHNICAL EDUCATION QUALITY IMPROVEMENT PROGRAM (TEQIP) PHASE-III</h3>
       
 <div class="login-container">
       
            <div clas="col-md-4 col-sm-4 col-xs-12"></div>
                     <div clas="col-md-4 col-sm-4 col-xs-12">
 <form action="index.php" method="get">
        <div class="container-fluid banner">
    <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-md">
                    <ul class="nav">

                        <li class="nav-item">
                            <a class="nav-link" href="index.php" >HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" >PORTFOLIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" >ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" >CONTACT</a>
                        </li>

                    </ul>
                    <ul class="nav">
                    <li class="nav-item"><button class="button" name="login-button">Login</button></li> 
      <li>  <button class="button" name="register-button">Register</button></li> 
                  </ul></nav> 
                   
      
           
            </div>
  </div>
    </form>
    </div>

</div>
</div>
<h3>BoG/ AC Minutes of Meetings</h3>

<li ><a href="http://www.walchandsangli.ac.in/teqip-III/AC-218-MOM-28-Feb-2017.pdf" class="m">February,2017</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/AC-219-MOM-26-May-2017.pdf" class="m"> May,2017</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/AC-220-MOM-24-August-2017.pdf" class="m"> August,2017</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/AC-221-MOM-28-Nov-2017.pdf" class="m"> November,2017</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/AC-222-MOM-27-Feb-2018.pdf" class="m"> February,2018</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/3.AC-MOM-21-Aug-2018.pdf" class="m"> August,2018</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/Annex-A-AC-225-MOM_.pdf" class="m"> December,2018</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/AC-226%20Minutes%20-%20draft%2014-03-2019.pdf" class="m"> March,2019</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/Minutes%20-%20AC%20MEETINGS.pdf" class="m"> June,2019</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/228%20-%20BOG%20Minutes.pdf" class="m"> August,2019</a></li>
<li><a href="http://www.walchandsangli.ac.in/teqip-III/229%20-%20BOG%20Minutes.pdf" class="m"> December,2019</a></li>

</body>
</html>


<?php
    if(isset($_GET['login-button']))
    {
        header("Location: Login/login.php");
        exit();
    }
    else if(isset($_GET['register-button']))
    {
        header("Location: Registration/register.php");
        exit();
    }
?>
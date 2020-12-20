<?php
    session_start();

    if(isset($_SESSION['userid']))
    {
        echo '<a href="proposals/form1.php"><button name="form1-button">Form No.1</button> </a><br>';
        echo '<a href="proposals/form2.php"><button name="form2-button">Form No.2</button> </a>';
        
    }
    else
    {
        header("Location: Login/login.php");
        exit();
    }
?>
    
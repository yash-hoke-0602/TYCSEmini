<?php
    session_start();

    if(isset($_SESSION['userid']))
    {
        echo '<a href="proposals/form1.php"><button name="form1-button">Form No.1</button> </a><br>';
        echo '<a href="proposals/groupReimbersement.php"><button name="groupReimbersement-button">Group Reimbersement Form</button> </a>';
        
    }
    else
    {
        header("Location: Login/login.php");
        exit();
    }
?>
    
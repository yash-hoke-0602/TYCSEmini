<?php
    session_start();

    if(isset($_SESSION['userid']))
    {
        echo "welcome ".$_SESSION['email'];
    }
    else
    {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <form action="logout.php" method="get">
        <button name="logout-button">Logout</button>
    </form>
    <a href="profile.php"><button name="profile-button">Profile</button> </a>
    <a href="proposal.php"><button name="proposal-button">proposals</button> </a>
    
</body>
</html>
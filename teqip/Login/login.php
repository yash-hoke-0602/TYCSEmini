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
    <title>Login</title>
</head>
<body>
    <form action="loggeduser.php" method="post">
        <?php
            if(isset($_GET['error']))
            {
                if($_GET['error']=="invaliduser")
                {
                    echo "email not found<br>";
                    echo '<input type="text" name="email" placeholder="Enter Email" required >
                    <br>';
                }
                else if($_GET['error']=="wrongpassword")
                {
                    echo "Please enter correct password<br>";
                    echo '<input type="text" name="email"  placeholder="Enter Email" required value="'. $_GET['email'] . '" >
                    <br>';
                }

            }
            else
            {
                echo '<input type="text" name="email" placeholder="Enter Email" required>
                <br>';
            }
        ?>
        
        <input type="password" name="password" placeholder="Enter Password" required>
        <br>
        <button name="login-button">Login</button>
    </form>
</body>
</html>


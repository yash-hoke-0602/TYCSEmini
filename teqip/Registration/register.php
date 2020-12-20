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
    <title>Register</title>
</head>
<body>
    <form action="newuser.php" method="post">
        <?php
            if(isset($_GET['error']))
            {
                if($_GET['error']=="invalidemail")
                {
                    echo "<br>Enter a valid email<br>";
                }
                else if($_GET['error']=="invalidedomain")
                {
                    echo "<br>Please Enter email of walchand domain<br>";
                }
                else if($_GET['error']=="duplicateuser")
                {
                    echo "<br>This email is already taken<br>";
                }
                if($_GET['error']=="confirmpwd")
                {
                    echo "Please Confirm the password<br>";
                    echo '<input type="text" name="email" placeholder="Enter Email" required value='.$_GET['email'].'><br>';
                }
                else
                {
                    echo '<input type="text" name="email" placeholder="Enter Email" required>
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
        <input type="password" name="re-password" placeholder="Confirm Password" required>
        <br>
        <button name="submit-button">Register</button>
        
    </form>
</body>
</html>


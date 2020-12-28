<?php
    session_start();
    if(!isset($_SESSION['userid']))
    {
        header("Location: Login/login.php");
        exit();
    }
    if(isset($_GET['error']))
    {
        if($_GET['error'] == "duplicateform")
        {
            echo "<br>You have already submitted this form<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="submit1.php" method="post">
        <input type="text" name="name" placeholder="Enter full name">
        <br>
        <input type="text" name="address" placeholder="Enter full address">
        <br>
        <input type="text" name="college" placeholder="Enter college name">
        <br>
        <br>
        <label for="sendoption">Send to</label>
        <select name="sendoption">
            <option value="admin1">admin1</option>
            <option value="faculty1">faculty1</option>
        </select>
        <br>
        <br>
        <br>
        <button name="submit-button">Submit</button>
    </form>    
</body>
</html>
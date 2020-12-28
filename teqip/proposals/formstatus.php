<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form status</title>
</head>
<body>
    <form action="formstatus.php" method="post">
        <select name="formtype" >
            <option value="form1">Form1</option>
            <option value="form2">Form2</option>
        </select>
        <button name="show-button">Show</button>
    </form>
</body>
</html>

<?php
    session_start();

    //check for logged in student user 
    if(isset($_SESSION['userid']) && $_SESSION['usertype']=="student")
    {
        //connection to DB
        require "../includes/db.php";

        //if show-button is clicked then show the forms
        if(isset($_POST['show-button']))
        {
            //$table will store name of table from where, data is going to be retrieved
            $table=$_POST['formtype'];

            //get the count of available forms from table
            $sql="SELECT * FROM ".$table." WHERE submittedby='".$_SESSION['email']."';";
            $result=mysqli_query($conn,$sql);
            $check=mysqli_num_rows($result);
            
            //there are forms available to show
            if($check>0)
            {
                //render all data available in the form table
                $all_property = array();
                while ($property = mysqli_fetch_field($result)) 
                {
                    array_push($all_property, $property->name);  //save all columns to array
                }
                $i=1;
                while ($row = mysqli_fetch_array($result)) 
                {
                    echo "<hr><br><b>Application No.</b>".$i;
                    echo "<br>";
                    $i++;
                    foreach ($all_property as $item) 
                    {
                        echo '<br>'.$item.' = '.$row[$item] ; //get items using property value
                    }
                }
            }
            else                                               //table if empty
            {
                echo "There's no record of form ".$table;
            }
        
        }
        else                                                    //select button is not clicked
        {
            echo "Please select type of form<br>";
        }
    }
    else
    {
        header("Location: ../home.php");
        exit();
    }
?>
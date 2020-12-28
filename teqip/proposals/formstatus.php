<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form status</title>
    <style type="text/css">
        .s button:hover{
            background-color: green;
            color: white;
        }
        .z {
            background-color: #ADD8E6;
        }
    </style>
</head>
<body>
    <form action="formstatus.php" method="post">
           <div class="s">
        <select name="formtype" >
            <option value="form1">Form1</option>
            <option value="form2">Form2</option>
        </select>
     
        <button name="show-button">Show</button>
        </div>
    </form>
    <div class="z">
    <?php
    session_start();
    if(isset($_SESSION['userid']) && $_SESSION['usertype']=="student")
    {
        require "../includes/db.php";
        if(isset($_POST['show-button']))
        {
            $table=$_POST['formtype'];
            $sql="SELECT * FROM ".$table." WHERE submittedby='".$_SESSION['email']."';";
            $result=mysqli_query($conn,$sql);
            $check=mysqli_num_rows($result);
            if($check>0)
            {
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
            else
            {
                echo "There's no record of form ".$table;
            }
        
        }
        else
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
</div>
</body>
</html>



<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Approved Forms</title>
    <style type="text/css">
        .z{
            background-color: #ADD8E6;
        }
    </style>
</head>
<body>
    <div class="z">
        <?php
    session_start();

    if(isset($_SESSION['userid']) && $_SESSION['usertype']=='admin')
    {
        require "../includes/db.php";

        $sql="SELECT * FROM approvedforms;";
        $result1=mysqli_query($conn,$sql);
        $check=mysqli_num_rows($result1);
        $i=1;
        if($check > 0)
        {
            while($row1 = mysqli_fetch_assoc($result1))
            {
                echo "<b>Application No. </b>".$i;
                echo "<br>";
                $i++;
                $table = $row1['formtype'];
                $id = $row1['formid'];
                echo "Application Type : ".$table;
                echo "<br>";
                echo "Applicant's Name : ".$row1['submittedby'];
                echo "<br>";
                echo "<br>";
                
                echo "<b>Application Data : </b>";
                echo "<br>";
                $sql1="SELECT * FROM ".$table." WHERE formid='".$id."' and formstatus='approved';";
                $result=mysqli_query($conn,$sql1);
                $all_property = array();
                while ($property = mysqli_fetch_field($result))
                {
                    array_push($all_property, $property->name);  //save all properties(columns) to array
                }
                //print all data with column and row
                while ($row = mysqli_fetch_array($result)) 
                {
                    foreach ($all_property as $item) 
                    {
                        echo  '<br>'.$item.' = '.$row[$item] ; //get items using property value
                    }
                    echo "<br>";
                }
                echo "<br>";
            }
        }
        else
        {
            echo "No forms to display";
        }
        
    }
    else
    {
        header("Location: ../Login/login.php");
        exit();
    }
?>



        
    </div>

</body>
</html>
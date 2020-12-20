<?php
    session_start();
    if(isset($_SESSION['userid']) && $_SESSION['usertype']=="admin")
    {
        require "../includes/db.php";
        $sql="SELECT * FROM admin1;";
        $result1=mysqli_query($conn,$sql);
        $check=mysqli_num_rows($result1);
        $i=1;
        if($check > 0)
        {
            //echo '<form action="administrator.php" method="post">';
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    echo "<b>Application No. </b>".$i;
                    echo "<br>";
                    
                    $table = $row1['formtype'];
                    $id = $row1['formid'];
                    echo "Application Type : ".$table;
                    echo "<br>";
                    echo "Applicant's Name : ".$row1['submittedby'];
                    echo "<br>";
                    echo "<br>";
                    
                    echo "<b>Application Data : </b>";
                    echo "<br>";
                    $sql1="SELECT * FROM ".$table." WHERE formid='".$id."' and formstatus='pending';";
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
                    if(isset($_GET['approved']) || isset($_GET['approved']))
                    {
                        if($_GET['approved']==$id || ($_GET['approved']==$id))
                        {
                        }
                        else
                        {
                            echo '<a href="administrator.php?approved='.$id.'" ><button name="'.$id.'">Approve</button></a>';
                            echo '<a href="administrator.php?rejected='.$id.'" ><button name="'.$id.'">Reject</button></a>';
                        }
                    }
                    else
                    {
                        echo '<a href="administrator.php?approved='.$id.'" ><button name="'.$id.'">Approve</button></a>';
                        echo '<a href="administrator.php?rejected='.$id.'" ><button name="'.$id.'">Reject</button></a>';
                    }
                    echo '<hr>';
                    if(isset($_GET['approved']))
                    {
                        if($id == $_GET['approved'])
                        {
                            //if form is approved then move data of admin to approvedform table and delete from formtype table
                            $formid=$_GET['approved'];

                            $sql="SELECT * FROM admin1 WHERE formid='".$formid."';";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            
                            $sql1="INSERT INTO approvedforms (formtype, formid, submittedby, approvedby) VALUES (?,?,?,?);";
                            $stmt1=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt1,$sql1))
                            {
                                header("Location: ../home.php?error=sqlerror");
                                exit();
                            }
                            else
                            {
                                $approv=$row['approvedby'].",admin";
                                mysqli_stmt_bind_param($stmt1,"ssss",$row['formtype'],$row['formid'],$row['submittedby'],$approv);
                                mysqli_stmt_execute($stmt1);
                                echo "<br>Form approved successfully<br>";
                                $sql2 = "DELETE FROM admin1 WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2); 
                                
                                
                                $sql2 = "UPDATE ".$row['formtype']." SET formstatus='approved' WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2);
                            }

                        }
                    }
                    if(isset($_GET['rejected']))
                    {
                        if($id == $_GET['rejected'])
                        {
                            //if form is rejected then move data of admin to rejectedform table and delete from formtype table
                            $formid=$_GET['rejected'];

                            $sql="SELECT * FROM admin1 WHERE formid='".$formid."';";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            
                            $sql1="INSERT INTO rejectedforms (formtype, formid, submittedby, approvedby) VALUES (?,?,?,?);";
                            $stmt1=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt1,$sql1))
                            {
                                header("Location: ../home.php?error=sqlerror");
                                exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt1,"ssss",$row['formtype'],$row['formid'],$row['submittedby'],$row['approvedby']);
                                mysqli_stmt_execute($stmt1);
                                echo "<br>Form rejected successfully<br>";
                                $sql2 = "DELETE FROM admin1 WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2); 
                                
                                $sql2 = "UPDATE ".$row['formtype']." SET formstatus='rejected' WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2); 
                            }
                        }
                    }
                    $i++;
                    echo '<hr>';
                }    
            //echo '</form>';
            echo '<a href="../home.php"> <button > Home</button> </a>';
        }
        else
        {
            echo "No forms to be verified";
            echo '<a href="../home.php"> <button > Home</button> </a>';
        }
    }
    else
    {
        header("Location: ../Login/login.php");
        exit();
    }
?>
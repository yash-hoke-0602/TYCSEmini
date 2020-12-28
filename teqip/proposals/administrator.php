<?php
    session_start();
    //check for looged in and admin user
    if(isset($_SESSION['userid']) && $_SESSION['usertype']=="admin")
    {
        echo '<a href="../home.php"> <button > Home</button> </a>';
        echo "<br>";
        //connection to DB
        require "../includes/db.php";
        //Check count of received forms
        $sql="SELECT * FROM admin1;";
        $result1=mysqli_query($conn,$sql);
        $check=mysqli_num_rows($result1);
        $i=1;
        
        if($check > 0)                          //there are received forms
        {
            //echo '<form action="administrator.php" method="post">';

            //render all forms
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    //render all form data from admin1 table
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
                    switch($table)
                    {
                        case 'form1':
                            {
                                //render all form data from form1 table
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
                            }
                            break;
                        case 'groupReimbersement':
                            {
                                $sql1="SELECT * FROM ".$table." WHERE formid='".$id."' and formstatus='pending';";
                                $result=mysqli_query($conn,$sql1);
                                $row2 = mysqli_fetch_assoc($result);
                                
                            
                                echo '
                                <pre>
Walchand College of Engineering,
Vishrambag, Sangli
TEQIP – III
Group Reimbursement Authority


To,
The Director,			
Walchand College of Engineering,
Vishrambag, Sangli

Sub: Reimbursement of Group Expenses

Respected Sir,
                                </pre>
                                ';
                                //render all form data from grpreimbersestudata table
                                $sql1="SELECT * FROM grpreimbersestudata WHERE formid='".$id."';";
                                $result=mysqli_query($conn,$sql1);
                                $all_property = array();
                                echo '<table><tr>';
                                echo '<th>Full Name</th>';
                                echo '<th>PRN</th>';
                                echo '</tr>';
                                //print all data with column and row
                                while ($row = mysqli_fetch_array($result)) 
                                {
                                    echo '<tr>';
                                    echo  '<td>'.$row['FullName'].'</td>' ; 
                                    echo  '<td>'.$row['PRN'].'</td>' ;
                                    echo "</tr>";
                                }   
                                echo '</table>';

                                echo '
                                <pre>
We are students of '.$row2['studyYear'].' of Dept. '.$row2['deptName'].' of 
WCE Sangli. We had attended '.$row2['eventDays'].' days of '.$row2['events'].'
conducted at Place'.$row2['eventLocation'] .'from date '.$row2['startDate'].' to date '.$row2['endDate'].'. 
We have applied for reimbursement of '.$row2['expenseType'].' 
from TEQIP III for '.$row2['participantNum'].' Participants.

Since, there is one claimant for our expenses; we have no objection to transfer the claim amount to '.$row2['NameOfRecpient'].' who 
is one of the participants of our group. As consent for the same we have signed below as our permission. 
Thanks & Regards,
Kindly do the needful.

                                </pre>
                                ';
                            }
                            break;
                    }
                    //add approved and reject buttons
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

                            //copy data from admin1
                            $sql="SELECT * FROM admin1 WHERE formid='".$formid."';";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            
                            //paste copied data to approvedforms table
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

                                //now delete data from admin1 as it is approved
                                $sql2 = "DELETE FROM admin1 WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2); 
                                
                                //change status of form from pending to approved
                                $sql2 = "UPDATE ".$row['formtype']." SET formstatus='approved' WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2);
                                header("Location: administrator.php");
                                exit();
                            }

                        }
                    }
                    if(isset($_GET['rejected']))
                    {
                        if($id == $_GET['rejected'])
                        {
                            //if form is rejected then move data of admin to rejectedform table and delete from formtype table
                            $formid=$_GET['rejected'];

                            //copy data from admin1
                            $sql="SELECT * FROM admin1 WHERE formid='".$formid."';";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            
                            //paste copied data to approvedforms table
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
                                
                                //now delete data from admin1 as it is approved
                                $sql2 = "DELETE FROM admin1 WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2); 
                            
                                //change status of form from pending to approved
                                $sql2 = "UPDATE ".$row['formtype']." SET formstatus='rejected' WHERE formid='".$formid."';";
                                mysqli_query($conn, $sql2); 
                                header("Location: administrator.php");
                                exit();
                            }
                        }
                    }
                    $i++;
                    echo '<hr>';
                }    
            //echo '</form>';
        }
        else
        {
            echo "No forms to be verified";
        }
    }
    else
    {
        header("Location: ../Login/login.php");
        exit();
    }
?>
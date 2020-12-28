<?php
    session_start();

    if(isset($_SESSION['userid']) && $_SESSION['usertype']=='admin')
    {
        require "../includes/db.php";

        $sql="SELECT * FROM rejectedforms;";
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
                switch($table)
                    {
                        case 'form1':
                            {
                                //render all form data from form1 table
                                $sql1="SELECT * FROM ".$table." WHERE formid='".$id."' and formstatus='rejected';";
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
                                break;
                            }
                        case 'groupReimbersement':
                            {
                                $sql1="SELECT * FROM ".$table." WHERE formid='".$id."' and formstatus='rejected';";
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
                                break;
                            }
                    }
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
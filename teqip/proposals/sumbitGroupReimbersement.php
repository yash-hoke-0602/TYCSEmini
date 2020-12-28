<?php
    
    function insertAll($index,$formid)
    {
        require "../includes/db.php";
        $FName="FullName".$index;
        $PRN="PRN".$index;

        $sql="INSERT INTO grpReimberseStuData (formid,FullName,PRN) VALUES (?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: groupReimbersement.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt,"sss",$formid,$_POST[$FName],$_POST[$PRN]);
            mysqli_stmt_execute($stmt);
        }    
    }


    if(isset($_POST['main-button']))
    {
        session_start();
        if(isset($_SESSION['userid']))
        {
            if(isset($_POST['main-button']))
            {
                require "../includes/db.php";

                //create unique form id
                $formid="fgr.".$_SESSION['userid'].".".time();
                

                $sql0="SELECT * FROM groupReimbersement WHERE submittedby=? and formstatus=?;";
                $stmt0=mysqli_stmt_init($conn);
                //if error
                if(!mysqli_stmt_prepare($stmt0,$sql0))
                {
                    header("Location: groupReimbersement.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $formstatus='pending';
                    mysqli_stmt_bind_param($stmt0,"ss",$_SESSION['email'],$formstatus);
                    mysqli_stmt_execute($stmt0);
                    mysqli_stmt_store_result($stmt0);
                    $check=mysqli_stmt_num_rows($stmt0);
                    if($check>0)                                       //duplicate form submission by same user
                    {
                        header("Location: groupReimbersement.php?error=duplicateform");
                        exit();
                    }
                    else
                    {

                        $year=$_POST['studyYear'];
                        $dept=$_POST['deptName'];
                        $days=''.$_POST['days'];
                        $event=$_POST['event'];
                        $location=$_POST['location'];
                        $startDate=''.$_POST['startDate'];
                        $endDate=''.$_POST['endDate'];
                        $expenseType=$_POST['expenseType'];
                        $participantNum=''.$_POST['participantNum'];
                        $NameOfRecpient=$_POST['NameOfRecpient'];

                        //Insert data into groupReimbersement table
                        $sql="INSERT INTO groupReimbersement (formid,studyYear,deptName,eventDays,events,eventLocation,startDate,endDate,expenseType,participantNum,NameOfRecpient,formstatus,submittedby) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
                        $stmt=mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql))
                        {
                            header("Location: groupReimbersement.php?error=sqlerror");
                            exit();
                        }
                        else
                        {
                            
                            mysqli_stmt_bind_param($stmt,"sssssssssssss",$formid,$year,$dept,$days,$event,$location,$startDate,$endDate,$expenseType,$participantNum,$NameOfRecpient,$formstatus,$_SESSION['email']);
                            mysqli_stmt_execute($stmt);
                            //forward data to admin or faculty 
                            $sql="INSERT INTO ".$_POST['sendoption']." (formtype,formid,submittedby,approvedby) VALUES (?,?,?,?);";
                            
                            $stmt=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql))
                            {
                                header("Location: groupReimbersement.php?error=sqlerror");
                                exit();
                            } 
                            else
                            {
                                $submitby=$_SESSION['email'];
                                $formtype="groupReimbersement";
                                $approveby="none";
                                mysqli_stmt_bind_param($stmt,"ssss",$formtype,$formid,$submitby,$approveby);
                                mysqli_stmt_execute($stmt);
                                
                                for($i=1;$i<=$_SESSION['StudentNum'];$i++)
                                {
                                    insertAll($i,$formid);
                                }

                                echo "Form submitted Successfully";
                                echo '<a href="../home.php"><button>Home</button></a>';
                            }
                        }
                    }
                }

            }
            else
            {
                header("Location: ../home.php");
                exit();
            }
        }
        else
        {
            header("Location: ../Login/login.php");
            exit();
        }
    }
    
?>
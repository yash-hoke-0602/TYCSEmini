<?php
    session_start();
    if(isset($_SESSION['userid']) && isset($_POST['submit-button']))
    {
        require "../includes/db.php";
        $name=$_POST['name'];
        $address=$_POST['address'];
        $clg=$_POST['college'];
        $formid="f1.".$_SESSION['userid'].".".time();
        
        $sql0="SELECT * FROM form1 WHERE submittedby=? and formstatus=?;";
        $stmt0=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt0,$sql0))
        {
            header("Location: form1.php?error=sqlerror");
            exit();
        }
        else
        {
            $formstatus='pending';
            mysqli_stmt_bind_param($stmt0,"ss",$_SESSION['email'],$formstatus);
            mysqli_stmt_execute($stmt0);
            mysqli_stmt_store_result($stmt0);
            $check=mysqli_stmt_num_rows($stmt0);
            if($check>0)
            {
                header("Location: form1.php?error=duplicateform");
                exit();
            }
            else
            {
                $sql="INSERT INTO form1 (formid,stuname,stuadd,stuclg,formstatus,submittedby) VALUES (?,?,?,?,?,?);";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: form1.php?error=sqlerror");
                    exit();
                }
                else
                {
                    
                    mysqli_stmt_bind_param($stmt,"ssssss",$formid,$name,$address,$clg,$formstatus,$_SESSION['email']);
                    mysqli_stmt_execute($stmt);
                    $sql="INSERT INTO ".$_POST['sendoption']." (formtype,formid,submittedby,approvedby) VALUES (?,?,?,?);";
                    
                    $stmt=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: form1.php?error=sqlerror");
                        exit();
                    } 
                    else
                    {
                        $submitby=$_SESSION['email'];
                        $formtype="form1";
                        $approveby="none";
                        mysqli_stmt_bind_param($stmt,"ssss",$formtype,$formid,$submitby,$approveby);
                        mysqli_stmt_execute($stmt);
                        echo "Form submitted Successfully";
                        echo '<a href="../home.php"><button>Home</button></a>';
                    }
                }
            }
        }
    }
    else
    {
        header("Location: ../Login/login.php");
        exit();
    }
?>
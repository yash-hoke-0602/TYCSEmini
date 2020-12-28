
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
    <title>Submit</title>
    <style type="text/css">
        p{
            align-content: center;
        }
        .home {
  background-image: url('bg.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
.s button:hover{
  background-color: green;
  color: white;


}
html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}
    </style>

</head>
<body class="home">
    <div class="z">
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
                        echo "<b><p>Form submitted Successfully</p><b>";
                        echo '<div class="s"><p><a href="../home.php"><button>Home</button></a></p><div>';
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
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Reimbersement form</title>
</head>
<body>
    <form action="groupReimbersement.php" method="post">
        <pre>
        <b>   Walchand College of Engineering,
            Vishrambag, Sangli
            TEQIP – III
            Group Reimbursement Authority

            To,
            The Director,			
            Walchand College of Engineering,
            Vishrambag, Sangli

            Sub: Reimbursement of Group Expenses

            Respected Sir,

        </b>
        </pre>
        <label>Enter total number of students</label> 
        <input type="number" name="StudentNum">
        <button name="StuNum-button">Submit</button>
    </form>

    <form action="sumbitGroupReimbersement.php" method="post">
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
            function allrows($index)
            {
                echo "<hr>";
                echo 'Student No.'.$index.' Enter Full Name:   ';
                echo '<input type="text" name="FullName'.$index.'" required>    ';
                echo ' Enter PRN:  ';
                echo '<input type="text" name="PRN'.$index.'" required>    ';
                echo "<br>";
            }
            if(isset($_POST['StuNum-button']))
            {
                if($_POST['StudentNum']>0)
                {
                    $_SESSION['StudentNum']=$_POST['StudentNum'];
                    for($i=1;$i<=$_POST['StudentNum'];$i++)
                    {
                        allrows($i); 
                    }
                    echo "<hr>";
                    echo '<pre>
                    We are students of 
                    <select name="studyYear" >
                        <option value="FY">FY</option>
                        <option value="SY">SY</option>
                        <option value="TY">TY</option>
                        <option value="Final">Final Year</option>
                    </select>
                    of Dept. <input type="text" name="deptName" placeholder="Department"> of WCE Sangli.
                    We had attended <input type="number" name="days" placeholder="Number of Days"> days of 
                    <select name="event" >
                        <option value="workshop">workshop</option>
                        <option value="seminar">seminar</option>
                        <option value="competition">competition</option>
                        <option value="paper-presentation">paper presentation</option>
                        <option value="conference">conference</option>
                        <option value="industrial-visit">Industrial visit</option>
                    </select> 
                    conducted at Place <input type="text" name="location" placeholder="Enter location"> from date <input type="date" name="startDate" > to date <input type="date" name="endDate" >. 
                    We have applied for reimbursement of  
                    <select name="expenseType" >
                        <option value="Travelling">Travelling</option>
                        <option value="Registration">Registration</option>
                        <option value="Food-Stay">Food + Stay</option>
                        <option value="Misc">Misc</option>
                        <option value="all">All above</option>
                    </select> expenses 
                    from TEQIP III for <input type="number" name="participantNum" placeholder="Number of participants"> Participants.

                    Since, there is one claimant for our expenses; we have no objection to transfer 
                    the claim amount to <input type="text" name="NameOfRecpient" placeholder="Enter name"> who is one of the participants of our group. 
                    As consent for the same we have signed below as our permission. 
                    
                    Thanks & Regards,
                    Kindly do the needful.
                    
                            </pre>';
                    echo "<hr>";
                    echo '<label for="sendoption">Send to</label>
                    <select name="sendoption">
                        <option value="admin1">admin1</option>
                        <option value="faculty1">faculty1</option>
                    </select>
                    <br>
                    <br>
                    ';
                    echo '<button name="main-button">Submit Form</button>';
                }
            }
        ?>
    </form>
</body>
</html>
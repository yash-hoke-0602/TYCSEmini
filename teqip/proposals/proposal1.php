<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Proposal-1</title>

	<style>
		body{
			background-color: #add8e6;
		}
		h1{
           text-align: center;
		}
		.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  
}
	</style>
</head>
<body>
	<div class="proposal form">
		<form method="post">
		<h1>Walchand College Of Engineering,Sangli<br>Proposal for TEQIP-3 Activity</h1>
		 <div class="row">
       
        	<label for="dep">Department / Section:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	
        	<select id="dep" name="dep" width="50" align="center" required>
        		<option value="" selected disabled hidden> 
          Select an Option 
      </option> 
  <option value="ce">Civil Engineering</option>
  <option value="am">Applied Mech</option>
  <option value="me">Mechanical Engineering</option>
  <option value="ele">Electrical Engineering</option>
  <option value="ee">Electronics Engineering</option>
  <option value="">Computer Sci and Engg.</option>
  <option value="audi">Information Technology</option>
  <option value="audi">Physics</option>
  <option value="audi">Chemistry</option>
  <option value="audi">Mathematics</option>
  <option value="audi">Gymkhana</option>
  <option value="audi">Exam Cell</option>
  <option value="audi">Hostel</option>
  <option value="audi">TPO</option>
  <option value="audi">CCF</option>
  <option value="audi">Student Clubs</option>
  <option value="audi">Office</option>
</select>
        	<br><br>
        	<label for="ref">Ref. No.:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	<input type="text" id="ref" name="ref" size="50" placeholder="Type Ref. No.(TEQIP-3/[Department/Section]/year/Number)" required="required">
        	<br><br>
        	<label for="activity">Activity Title And Place:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	<textarea font family:times new roman cols="47">Type activity title and place details</textarea>
        	<br><br>

        	<label for="coordinator">Coordinator:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	<input type="text" id="coordinator" name="coordinator" size="50" placeholder="Coordinator Name" required="required">
        	<br><br>
        	<label for="email">Coordinator Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	 <input type="email"  name="email" placeholder="Email" size="50" id="email" required="required">
        	 <br><br>
        	 <label for="pno">Coordinator contact:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	 
        	 <input type="text" name="pno" placeholder="Contact" size="50" id="pno" required="required">
        	 <br><br>
        	 <label for="co-coordinator">Co-Coordinator:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	 <input type="text" id="co-coordinator" name="co-coordinator" size="50" placeholder="Co-Coordinator Name" required="required">
        	 <br><br>
        	 <label for="email">Co-Coordinator Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	 <input type="email"  name="email" placeholder="Email" size="50" id="email" required="required">
        	 <br><br>
        	 <label for="activity">Objectives:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	<textarea font family:times new roman cols="48"></textarea>
        	<br><br>
        	<label for="activity">Beneficiaries:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	<textarea font family:times new roman cols="48"></textarea>
        	<br><br>
        	<label for="activity">Deliverables (outcomes):&nbsp&nbsp&nbsp&nbsp</label>
        	<textarea font family:times new roman cols="48"></textarea>
        	<br><br>
        	<label for="activity">Participants:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        	<textarea font family:times new roman cols="48">If participants are students then please type PRN numbers(attach seperate sheet necessary)</textarea>
        	<br><br>
        	  <label for="myfile">Select a file:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
  <input type="file" id="myfile" name="myfile" accept=".xlsx"><br><br>
<h2 align="center">Budget(Expenditure)</h2>
 <label for="a">A.Expenditure on External Agency:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
 <input type="text"  name="a" size="50" id="a" required="required">
 <br><br>
  <label for="b">B.Total Expenses(Other than A):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
  <input type="text"  name="b" size="50" id="b" required="required">
  <br><br>
   <label for="c">C. Total Resource Generation:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
   <input type="text"  name="c" size="50" id="c" required="required">
   <br><br>
    <label for="a+b">A+B. Total Expense:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text"  name="a+b" size="50" id="a+b" required="required">
    <br><br>
    <p>
    	To,The Director,<br>
    	Kindly allow for conductingthe program and approve the budget as shown above.
    </p>
     <label for="activity-co">Activity Coordinator:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="activity-co" name="activity-co" accept="image/jpg,image/png,image/jpeg">
    <br><br>
    <label for="activity-co-co">Activity Co-Coordinator:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="activity-co-co" name="activity-co-co" accept="image/jpg,image/png,image/jpeg">
    <br><br>
    <label for="dept">Dept/Section Head:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="dept" name="dept" accept="image/jpg,image/png,image/jpeg">
    <br><br>
    <label for="academic">Procurement /Acadamic Officer:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="academic" name="academic" accept="image/jpg,image/png,image/jpeg">
    <br><br>
     <label for="finance">Finance Officer:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="director" name="director" accept="image/jpg,image/png,image/jpeg">
    <br><br>
    <label for="teqip">TEQIP Coordinator:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="teqip" name="teqip" accept="image/jpg,image/png,image/jpeg">
    <br><br>
    <label for="director">Director:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="file" id="director" name="director" accept="image/jpg,image/png,image/jpeg">
   <br><br>
   <div align="center">
         <button type="submit" class="button" name="submit" value="submit">SUBMIT</button>
         </div>
		</form>
	</div>
</body>
</html>
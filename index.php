<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php include 'initialDB.php';?>		
	</head>
	<body>
		<div class="blockMain2">
				<button onclick="showAddCompany('div1')" type="button">form 1</button>
				<button onclick="showAddCompany('div3')" type="button">form 2</button>
		</div>
		<div class = "blockMain">			
			<div class="block1" id="div1">
				<form autocomplete="on">
					Name:<br> <input type="text" id="name" name="name"><br>
					Surname:<br> <input type="text" id="surname" name="surname"><br>
					Birthday:<br> <input type="date" id="birthday" name="birthday"><br>
					E-mail:<br> <input type="text" id="email" name="email"><br>
					Telephone:<br> <input type="telephone" id="telephone" name="telephone"><br>
					Address:<br> <input type="text" id="address" name="address"><br>
					Current company:<br> <input type="search" id="comp" onkeyup="showResult(this.value, 1)" name="currentCompany" autocomplete="off">
					<div id="txtHint"></div> 
					<button id="btnAddCompany" onclick="showAddCompany('div2')" type="button">Add</button><br>
					Role:<br> <input type="text" id="role" name="role"><br><br>
					<button id="submitEmp" onclick="addEmployeeToDB()" type="button">Submit</button>
					
				</form>
			</div>
			<div class="block2" id="div2">
				<form action="addcompany.php" method="post" autocomplete="off">
					Company Name: <input type="text" name="companyName"><br>
					NIPT: <input type="text" name="nipt"><br>					
					Company address: <input type="text" name="companyAddress"><br><br>					
					<input type="submit">
				</form>
			</div>
			<div class="block3" id="div3">
				<form action="addperiods.php" method="post" autocomplete="off">
					Employee: <input type="text" id="setName" name="employee" onkeyup="showResultName(this.value)"  autocomplete="off"><br>
					<div id="nameHint"></div> 
					Company Name: <input type="text" id="comp2" onkeyup="showResult(this.value)" name="companyNamePeriods">
					<button id="btnAddCompany"  onclick="showAddCompany('div2')" type="button">Add</button><br>
					<div id="txtHint2"></div> 
					Start Date: <input type="date" name="startDate"><br>
					End Date: <input type="date" name="endDate"><br><br>					
					<input type="submit">
				</form>
			</div>			
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="scripts.js"></script>		
	</body>
</html>




<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "mycompany";
			$emplTab = "employee";
			$companyTab = "companies";
			$workPeriodsTab = "periodsOfWork";

			$conn = new mysqli($servername, $username, $password);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 
			$dbSelected = mysqli_select_db($conn, $dbname);
			if(!$dbSelected){
				// If we couldn't, then it either doesn't exist, or we can't see it.
  				$sql = 'CREATE DATABASE ' . $dbname;
  				if ($conn->query($sql) === TRUE) {
				    echo "Database created successfully<br>";
				    $conn = new mysqli($servername, $username, $password, $dbname);
				    if ($conn->connect_error) {
		    			die("Connection failed to db: " . $conn->connect_error);
					} 
				    $sql = 'CREATE TABLE ' . $companyTab . ' (
							companyName VARCHAR(30) NOT NULL PRIMARY KEY,
							nipt VARCHAR(30) NOT NULL,
							address VARCHAR(50)							
							)';
					if ($conn->query($sql) === TRUE) {
						echo "Table " . $companyTab . " created successfully<br>";
					} else {
						echo "Error creating table: " . $conn->error;
					}
					$sql = 'CREATE TABLE ' . $workPeriodsTab . ' (
							employee VARCHAR(30) NOT NULL,
							companyName VARCHAR(30) NOT NULL,
							startDate DATE NOT NULL,
							endDate DATE NOT NULL							
							)';
					if ($conn->query($sql) === TRUE) {
						echo "Table " . $workPeriodsTab . " created successfully<br>";
					} else {
						echo "Error creating table: " . $conn->error;
					}
				    $sql = 'CREATE TABLE ' . $emplTab . ' (
							id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
							name VARCHAR(30) NOT NULL,
							surname VARCHAR(30) NOT NULL,
							birthday DATE NOT NULL,
							email VARCHAR(50),
							telephone INTEGER(20),
							address VARCHAR(50) NOT NULL,
							companyName VARCHAR(30) NOT NULL,
							role VARCHAR(30) NOT NULL,
							FOREIGN KEY (companyName) REFERENCES ' . $companyTab . '(companyName)
							)';
					if ($conn->query($sql) === TRUE) {
						echo "Table " . $emplTab . " created successfully<br>";
					} else {
						echo "Error creating table: " . $conn->error;
					}
				} else {
				    echo "Error creating database: " . $conn->error;
				}
			}
			$conn->close();
			?>
	</head>
	<body>
		<div class="blockMain2">
				<button onclick="showAddCompany('div1')" type="button">form 1</button>
				<button onclick="showAddCompany('div3')" type="button">form 2</button>
		</div>
		<div class = "blockMain">			
			<div class="block1" id="div1">
				<form action="addemployee.php" method="post" autocomplete="on">
					Name:<br> <input type="text" name="name"><br>
					Surname:<br> <input type="text" name="surname"><br>
					Birthday:<br> <input type="date" name="birthday"><br>
					E-mail:<br> <input type="text" name="email"><br>
					Telephone:<br> <input type="telephone" name="telephone"><br>
					Address:<br> <input type="text" name="address"><br>
					Current company:<br> <input type="search" id="comp" onkeyup="showResult(this.value, 1)" name="currentCompany" autocomplete="off">
					<div id="txtHint"></div> 
					<button id="btnAddCompany" onclick="showAddCompany('div2')" type="button">Add</button><br>
					Role:<br> <input type="text" name="role"><br><br>
					<input type="submit">
					
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
					Employee: <input type="text" name="employee" autocomplete="on"><br>
					Company Name: <input type="text" id="comp2" onkeyup="showResult(this.value)" name="companyNamePeriods">
					<button id="btnAddCompany"  onkeyup="showResult(this.value, 0)" onclick="showAddCompany('div2')" type="button">Add</button><br>
					<div id="txtHint2"></div> 
					Start Date: <input type="date" name="startDate"><br>
					End Date: <input type="date" name="endDate"><br><br>					
					<input type="submit">
				</form>
			</div>
			
		</div>
		<script src="scripts.js"></script>
		<script type="text/javascript">
			function showResult(str,b) {
			    if (str == "") {
			        document.getElementById("txtHint").innerHTML = "";
			        document.getElementById("txtHint2").innerHTML = "";
			        return;
			    } else { 
			        if (window.XMLHttpRequest) {
			            // code for IE7+, Firefox, Chrome, Opera, Safari
			            xmlhttp = new XMLHttpRequest();
			        } else {
			            // code for IE6, IE5
			            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			        xmlhttp.onreadystatechange = function() {
			        	if(b){
				            if (this.readyState == 4 && this.status == 200) {
				                document.getElementById("txtHint").innerHTML = this.responseText;
				            }
			        	} else {
			        		if (this.readyState == 4 && this.status == 200) {
				                document.getElementById("txtHint2").innerHTML = this.responseText;
				            }
			        	}
			        };
			        xmlhttp.open("GET","livesearch.php?q="+str,true);
			        xmlhttp.send();
			    }
			}

			function setCompany(str){
				document.getElementById("comp").value = str;
				document.getElementById("comp2").value = str;	
			}
		</script>
	</body>
</html>




<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mycompany";
	$emplTab = "employee";
	$companyTab = "companies";
	$workPeriodsTab = "periodsOfWork";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO " . $workPeriodsTab . " (employee, companyName, startDate, endDate)
	VALUES ('" . $_POST["employee"] . "', '"
	 . $_POST["companyNamePeriods"] . "', '" 
	 . $_POST["startDate"] . "', '" 
	 . $_POST["endDate"] ."')";
	
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	echo "<br>"; 
	echo $_POST["employee"]; echo "<br>"; 
	echo $_POST["companyNamePeriods"]; echo "<br>"; 
	echo $_POST["startDate"]; echo "<br>"; 
	echo $_POST["endDate"];echo "<br>"; 
	
?> 
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

	$sql = "INSERT INTO " . $companyTab . " (companyName, nipt, address)
	VALUES ('" . $_POST["companyName"] . "', '"
	 . $_POST["nipt"] . "', '" 
	 . $_POST["companyAddress"] ."')";
	
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	echo "<br>"; 
	echo $_POST["companyName"]; echo "<br>"; 
	echo $_POST["nipt"]; echo "<br>"; 
	echo $_POST["companyAddress"]; echo "<br>"; 
?> 
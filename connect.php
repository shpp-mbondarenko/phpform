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
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
?>
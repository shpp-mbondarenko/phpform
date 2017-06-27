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

	$sql = "INSERT INTO " . $emplTab . " (name, surname, birthday, email, telephone, address, companyName, role)
	VALUES ('" . $_POST["name"] . "', '"
	 . $_POST["surname"] . "', '" 
	 . $_POST["birthday"] . "', '" 
	 . $_POST["email"] . "', '" 
	 . $_POST["telephone"] . "', '" 
	 . $_POST["address"] . "', '" 
	 . $_POST["currentCompany"] . "', '" 
	 . $_POST["role"] ."'')";
	/*
	$sql = "INSERT INTO " . $companyTab . " (companyName,
							nipt ,
							address )		
	VALUES ('google', 'nipt', 'adress')";
	$sql = "INSERT INTO " . $emplTab . " (name,
							surname,
							birthday,
							email,
							telephone,
							address,
							companyName,
							role)
	VALUES ('John', 'Doe', '180891', 'john@example.com', '066241', 'street', 'google', 'admin')";
*/
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	echo "<br>"; 
	echo $_POST["name"]; 
	echo $_POST["surname"]; 
	echo $_POST["email"]; 
	echo $_POST["telephone"];
	echo $_POST["birthday"]; 
	echo $_POST["address"]; 
	echo $_POST["currentCompany"]; 
	echo $_POST["role"];  
?> 
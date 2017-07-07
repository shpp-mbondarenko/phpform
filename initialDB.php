<?php
	include 'connect.php';
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
		    		idComp INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
					companyName VARCHAR(30) NOT NULL,
					nipt VARCHAR(30) NOT NULL,
					address VARCHAR(50)							
					)';
			if ($conn->query($sql) === TRUE) {
				echo "Table " . $companyTab . " created successfully1<br>";
			} else {
				echo "Error creating table: " . $conn->error;
			}
			$sql = 'CREATE TABLE ' . $workPeriodsTab . ' (
					idEmp INT(6) NOT NULL REFERENCES ' . $emplTab . ' (idEmp),
					idComp INT(6) NOT NULL REFERENCES ' . $companyTab . ' (idComp),
					startDate DATE NOT NULL,
					endDate DATE							
					)';
			if ($conn->query($sql) === TRUE) {
				echo "Table " . $workPeriodsTab . " created successfully2<br>";
			} else {
				echo "Error creating table: " . $conn->error;
			}
		    $sql = 'CREATE TABLE ' . $emplTab . ' (
					idEmp INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
					name VARCHAR(30) NOT NULL,
					surname VARCHAR(30) NOT NULL,
					birthday DATE NOT NULL,
					email VARCHAR(50),
					telephone INTEGER(20),
					address VARCHAR(50) NOT NULL,
					idComp INT(6) NOT NULL  REFERENCES ' . $companyTab . ' (idComp),
					role VARCHAR(30) NOT NULL
					)';
			if ($conn->query($sql) === TRUE) {
				echo "Table " . $emplTab . " created successfully3<br>";
			} else {
				echo "Error creating table: " . $conn->error;
			}
		} else {
		    echo "Error creating database: " . $conn->error;
		}
	}
	$conn->close();
?>
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
<?php 
	include 'connect.php';

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
	echo $_POST["endDate"];echo "<br><br>"; 
	echo '<a style="color:#0000FF;font-size: 20px" onClick="javascript:history.back(1)">back</a>'; 
	
?> 
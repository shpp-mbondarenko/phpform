<?php 
	include 'connect.php';

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
	echo $_POST["companyAddress"]; echo "<br><br>";  
	echo '<a style="color:#0000FF;font-size: 20px" onClick="javascript:history.back(1)">back</a>'; 
?> 
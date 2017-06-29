<?php 
	include 'connect.php';

	$sql = "INSERT INTO " . $emplTab . " (name, surname, birthday, email, telephone, address, companyName, role)
	VALUES ('" . $_POST["name"] . "', '"
	 . $_POST["surname"] . "', '" 
	 . $_POST["birthday"] . "', '" 
	 . $_POST["email"] . "', '" 
	 . $_POST["telephone"] . "', '" 
	 . $_POST["address"] . "', '" 
	 . $_POST["currentCompany"] . "', '" 
	 . $_POST["role"] ."'')";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	echo "<br>"; 
	echo $_POST["name"]; echo "<br>"; 
	echo $_POST["surname"]; echo "<br>"; 
	echo $_POST["email"]; echo "<br>"; 
	echo $_POST["telephone"];echo "<br>"; 
	echo $_POST["birthday"]; echo "<br>"; 
	echo $_POST["address"]; echo "<br>"; 
	echo $_POST["currentCompany"]; echo "<br>"; 
	echo $_POST["role"];echo "<br><br>"; ;  
	echo '<a style="color:#0000FF;font-size: 20px" onClick="javascript:history.back(1)">back</a>'; 
?> 
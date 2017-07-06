<?php 
	include 'connect.php';


	$query = "SELECT * FROM ". $companyTab .' WHERE companyName="' . $_POST["companyNamePeriods"] .'"';
	$res = mysqli_query($conn,$query);
	$id = $res->fetch_assoc()['idComp'];
	//echo "id = ";echo $id ;echo "<br>";

	$query = "SELECT * FROM ". $emplTab .' WHERE name="' . $_POST["employee"] .'" OR surname="' . $_POST["employee"] .'"';
	$res = mysqli_query($conn,$query);
	$idEmp = $res->fetch_assoc()['idEmp'];
	//echo "id = ";echo $idEmp ;echo "<br>";

	$sql = "INSERT INTO " . $workPeriodsTab . " (idEmp, idComp, startDate, endDate)
	VALUES ('" . $idEmp . "', '"
	 . $id . "', '" 
	 . $_POST["startDate"] . "', '" 
	 . $_POST["endDate"] ."')";

	 if(!isRealDate($_POST['startDate']) or !isRealDate($_POST['endDate'])) {
	    echo "Invalid Date";
	    exit();
	}

	
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	function isRealDate($date) { 
		if (false === strtotime($date)) { 
		    return false;
		} else { 
		    list($year, $month, $day) = explode('-', $date); 		    
		    if (false === checkdate($month, $day, $year)) { 
		        return false;
		    } 
		    if ($year > (date('y')+2000) or $year < 1950) {
		    	return false;
		    }
		} 
		return true;
	}
	
?> 
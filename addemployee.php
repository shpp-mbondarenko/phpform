<?php 
	include 'connect.php';
//select id of company
	$query = "SELECT * FROM ". $companyTab .' WHERE companyName="' . $_POST["currentCompany"].'"';
	$res = mysqli_query($conn,$query);
	$id = $res->fetch_assoc()['idComp'];

	$sql = "INSERT INTO " . $emplTab . " (name, surname, birthday, email, telephone, address, idComp, role)
	VALUES ('" . clearFromTags($_POST["name"]) . "', '"
	 . clearFromTags($_POST["surname"]) . "', '" 
	 . $_POST["birthday"] . "', '" 
	 . $_POST["email"] . "', '" 
	 . $_POST["telephone"] . "', '" 
	 . clearFromTags($_POST["address"]) . "', '" 
	 . $id . "', '" 
	 . clearFromTags($_POST["role"]) ."')";
	 	
//date check
	if(!isRealDate($_POST['birthday'])) {
	    echo "Invalid Date"; echo "<br>";
	    exit();
	}
//phone num check
	if(!isRealPhone($_POST['telephone'])) {
	    echo "Invalid telephone number"; echo "<br>";
	    exit();
	}
//email validation
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	    echo "Invalid email format";
	    exit(); 
	}	
//add employee
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
/*
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
*/
	function isRealDate($date) { 
		if (false === strtotime($date)) { 
		    return false;
		} else { 
		    list($year, $month, $day) = explode('-', $date); 		    
		    if (false === checkdate($month, $day, $year)) { 
		        return false;
		    } 
		    if ($year > (date('y')+2000) and $year < 1950) {
		    	return false;
		    }
		} 
		return true;
	}

	function isRealPhone($string) {
		//eliminate every char except 0-9
		$justNums = preg_replace("/[^0-9]/", '', $string);
		if (strlen($justNums) == 10) {
			return true;
		} else {
			return false;
		}
	}
	function clearFromTags($string) {
		$res = preg_replace("/[^a-zA-Z=_\s]/", '', $string);
		return $res;
	}
?> 
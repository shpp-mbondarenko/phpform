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
	    echo "Invalid Date"; 
	    exit();
	}
//phone num check
	if(!isRealPhone($_POST['telephone'])) {
	    echo "Invalid telephone number"; 
	    exit();
	}
//email validation
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	    echo "Invalid email format";
	    exit(); 
	}
//if company wasnt find	
	if ($id == 0) {
		echo "Invalid company";
	    exit(); 
		}	
//add employee
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

	function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}
?> 
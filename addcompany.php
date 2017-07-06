<?php 
	include 'connect.php';

	$stmt = mysqli_prepare($conn, "INSERT INTO " . $companyTab . " (companyName, nipt, address) VALUES (?, ?, ?)");
	$companyName = $_POST["companyName"];
	$nipt = $_POST["nipt"];
	$address = $_POST["companyAddress"];	
	mysqli_stmt_bind_param($stmt,'sss',$companyName, $nipt, $address);
	if(mysqli_stmt_execute($stmt)){
		$conn->close();
		echo "Adding is successful"; 	
	}
	
	
	function clearFromTags($string) {
		$res = preg_replace("/[^a-zA-Z=_\s]/", '', $string);
		return $res;
	}
?> 
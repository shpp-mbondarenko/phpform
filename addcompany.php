<?php 
	include 'connect.php';

	$stmt = mysqli_prepare($conn, "INSERT INTO " . $companyTab . " (companyName, nipt, address) VALUES (?, ?, ?)");
	$companyName = $_POST["companyName"];
	$nipt = $_POST["nipt"];
	$address = $_POST["companyAddress"];	
	mysqli_stmt_bind_param($stmt,'sss',$companyName, $nipt, $address);
	mysqli_stmt_execute($stmt);
	$conn->close();

	echo "<p>Adding is successful</p><br>"; 
	echo $_POST["companyName"]; echo "<br>"; 
	echo $_POST["nipt"]; echo "<br>"; 
	echo $_POST["companyAddress"]; echo "<br><br>";  
	echo '<a style="color:#0000FF;font-size: 20px" onClick="javascript:history.back(1)">back</a>'; 
	
	function clearFromTags($string) {
		$res = preg_replace("/[^a-zA-Z=_\s]/", '', $string);
		return $res;
	}
?> 
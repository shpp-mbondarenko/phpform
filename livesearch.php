<?php
if (!empty($_GET['q'])) {
	 include 'connect.php';
	 $q = $_GET['q'];	 
	 $query = "SELECT * FROM " . $companyTab . " WHERE companyName LIKE '".$q."%'";
	 $result = mysqli_query($conn,$query);
	 while ($output = mysqli_fetch_assoc($result)) {
	 	echo '<a onclick=setCompany("'.$output['companyName']. '")>' . $output['companyName'] . '</a></br>';	 	
	 }
}


?>
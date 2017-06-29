<?php
if (!empty($_GET['q'])) {
	 include 'connect.php';
	 $q = $_GET['q'];	 
	 $query = "SELECT * FROM " . $emplTab . " WHERE name LIKE '%".$q."%' OR surname LIKE '%".$q."%'";
	 $result = mysqli_query($conn,$query);
	 while ($output = mysqli_fetch_assoc($result)) {
	 	echo '<a onclick=setName("'.$output['name']  . "_" . $output['surname'] . '")>' . $output['name'] . ' ' . $output['surname'] . '</a></br>';	 	
	 }
}


?>
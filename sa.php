

 	<?php 
 	session_start();
 	if($_SESSION['log_in']!="true"&&!isset($_SESSION['log_in'])){
		header("location:login.php");
	    exit();
	}
  		$servername = "localhost";
		$username = "root";
		$password = "";
		$db="mydb";

		// Create connection
		$conn1 = new mysqli($servername, $username, $password,$db);
		$res=$conn1->query("SELECT distinct(place) from hotel ORDER BY place");
		if ($res->num_rows>0) {
			while ($h=$res->fetch_assoc()) {
				
				
				echo '<option value="'.$h["place"].'"></option>';
				
			}
		}
 ?>
 
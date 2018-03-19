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
		$conn = new mysqli($servername, $username, $password,$db);

		// Check connection
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}

		$result = $conn->query("SELECT * from users where email=\"".$_SESSION["mail"]."\"");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo $row["name"];
			}
		}
 ?>
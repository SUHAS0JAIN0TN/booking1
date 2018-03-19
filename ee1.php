<?php
	#session_start();
    function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
          return $data;
        }
    if ($_POST) {
          session_start();
          
          $email = test_input($_POST["email"]);
          $pass = test_input($_POST["pass"]);
          var_dump($_POST["email"]);
          var_dump($pass);

            $pass=sha1($pass);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("");
         
            }

            $sql = "SELECT * from users WHERE email='$email' AND pass='$pass'";

            if ($id=mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($id) == 1) {
                    echo "string";
                    $_SESSION['log_in']="true";
                    $_SESSION["mail"]=$email;
                    header("location:MAIN.php");
                    exit();
                }
                else{
                    
                    $_SESSION['log_in']="invalid";
                    header("location:login.php");
                    exit();
                }

            }




            mysqli_free_result($id);
            mysqli_close($conn);
        
}
?>



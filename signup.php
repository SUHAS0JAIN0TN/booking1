


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
   
</head>
<style>
  .form-group{
    margin: 20px;
  }
  input{
    padding: 7px;
    width: 300px;
  }
</style>
<body style="background-color: #ceff99;margin-left: 400px; margin-right: 400px; margin-top: 50px;">

        <div >
            <div class="row">
                <h2> </h2> 
                
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <fieldset>

        <!-- Form Name -->
        Register Here

        <!-- Text input-->
        <div class="form-group">
          <label for="name">First Name</label>  
          <div >
          <input  name="name" placeholder="Insert your First Name" class="form-control input-md" required="" type="text">
          
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label for="lname">Last Name</label>  
          <div >
          <input  name="lname" placeholder="Insert your Last Name" class="form-control input-md" required="" type="text">
          
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label for="email">Email</label>  
          <div >
          <input  name="email" placeholder="Insert your Email" class="form-control input-md" required="" type="text">
          
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label for="pass" >Password</label>  
          <div >
          <input  name="pass" placeholder="Insert your Password" class="form-control input-md" required="" type="password">
          
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label for="cpass"  >Confirm Password</label>  
          <div >
          <input  name="cpass" placeholder="Confirm your Password" class="form-control input-md" required="" type="password">
          
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton"> </label>
          <div class="col-md-4">
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
          </div>
        </div>

        </fieldset>
        </form>
          



</body>
</html>

<?php

    function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
          return $data;
        }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {{
          $name = test_input($_POST["name"]);
          $lname = test_input($_POST["lname"]);
          $email = test_input($_POST["email"]);
          $pass = test_input($_POST["pass"]);
          $cpass = test_input($_POST["cpass"]);
        }

        


        if ($pass==$cpass) {
            # code...
            #echo "password doesnot matches";
        





            $pass=sha1($pass);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
         
            }

            $sql = "INSERT INTO users (name, lname, email,pass)
            VALUES ('$name','$lname','$email','$pass')";

            if (mysqli_query($conn, $sql)) {
              $q=true;
                echo "New record created successfully";
            } else {
              $q=false;
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
            if ($q) {
              session_start();
              $_SESSION['log_in']="true";
              $_SESSION["mail"]=$email;
            header("Location:MAIN.php");
            
            exit;
            }
            
        }
    }
?>
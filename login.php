<?php 
session_start();$_SESSION['log_in'];
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>getting hotel</title>

	<style type="text/css">
		body{
			background-color: #ceff99;
			margin-left: 400px;
            margin-right: 400px; 
            margin-top: 50px;
		}
        .form-group{
            margin: 20px;
        }
        input{
            padding: 7px;
            width: 300px;
        }
	</style>
<script type="text/javascript">
    function veri(){
        var sess=<?php echo "\"".$_SESSION['log_in']."\""; ?>;
        if (sess=="invalid") {
            document.getElementById('invalid').innerHTML="Invalid email and password";
        }
        
    }
</script>
    
</head>
<body onload="veri();">




        
<div>
    <h3 >Log In</h3>
</div>
<div>
                        <form role="form" action="ee1.php" method="post">
                            <fieldset>
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <input placeholder="E-mail" name="email" type="text" autofocus="">
                                </div>
                                <label for="pass" >Password</label>
                                <div class="form-group">
                                    <input placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <button>Submit</button>
                                <div id="invalid" style="color: red;"></div>
                            </fieldset>
                        </form>
</div>
                

      
    
</body>
</html>





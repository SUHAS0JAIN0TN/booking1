<?php 
	session_start();
	if($_SESSION['log_in']!="true"&&!isset($_SESSION['log_in'])){
		header("location:login.php");
    	exit();
	}

		
		$_SESSION["place"]=$_POST["place"];
		$_SESSION["roomType"]=$_POST["roomType"];
		$_SESSION["order"]=$_POST["order"];
		$_SESSION["maxx"]=$_POST["maxx"];
		$_SESSION["min"]=$_POST["min"];
		$_SESSION["nam"]=$_POST["nam"];
		$_SESSION["spa"]=$_POST["spa"];
		$_SESSION["wifi"]=$_POST["wifi"];
		$_SESSION["pool"]=$_POST["pool"];
		$_SESSION["bf"]=$_POST["bf"];
		
		$_SESSION["butt"]=$_POST["butt"];

		$place=$_SESSION["place"];
		$roomType=$_SESSION["roomType"];
		$order=$_SESSION["order"];
		$maxx=$_SESSION["maxx"];
		$min=$_SESSION["min"];
		$nam=$_SESSION["nam"];
		$spa=$_SESSION["spa"];
		$wifi=$_SESSION["wifi"];
		$pool=$_SESSION["pool"];
		$bf=$_SESSION["bf"];
		$butt=$_SESSION["butt"];

		$count=0;$tl="";$quer="";$c="";
		
		if ($place!="") {
			$quer="SELECT pl.hid from hotel pl,type t where pl.place='$place' and pl.hid=t.hid and t.type='$roomType'";$tl="pl";
			if ($maxx!=""&&is_numeric($maxx)) {
				$quer=$quer."and ".$tl.".hid in (SELECT mx.hid from type mx where mx.price<'$maxx'";$tl="mx";$count=$count+1;
			}
			if ($min!=""&&is_numeric($min)) {
				$quer=$quer."and ".$tl.".hid in (SELECT mn.hid from type mn where mn.price>'$min'";$tl="mn";$count=$count+1;
			}
			if ($spa=="true") {
				$quer=$quer."and ".$tl.".hid in (SELECT sp.hid from facility sp where sp.faci='s'";$tl="sp";$count=$count+1;
			}
			if ($wifi=="true") {
				$quer=$quer."and ".$tl.".hid in (SELECT wf.hid from facility wf where wf.faci='w'";$tl="wf";$count=$count+1;
			}
			if ($pool=="true") {
				$quer=$quer."and ".$tl.".hid in (SELECT po.hid from facility po where po.faci='p'";$tl="po";$count=$count+1;
			}
			if ($bf=="true") {
				$quer=$quer."and ".$tl.".hid in (SELECT bf.hid from facility bf where bf.faci='b'";$tl="bf";$count=$count+1;
			}
			if ($butt!="") {
				$quer=$quer."and ".$tl.".hid in (SELECT bt.hid from hotel bt where bt.rating>'$butt'";$tl="mn";$count=$count+1;
			}
			while ($count > 0) {
				$quer=$quer.") ";
				$count=$count-1;
			}

			

			if ($order==1) {
				$quer=$quer."order by pl.rating";
			}
			elseif ($order==2) {
				$quer=$quer."order by t.price";
			}
			elseif ($order==3) {
				$quer=$quer."order by pl.distance";
			}
			//echo $quer."<br/>";
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
		
		$result = $conn->query($quer);

		if ($result->num_rows > 0) {
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
        		
        		$h=$conn->query("SELECT *from hotel where hid='$row[hid]'");
        		$r=$h->fetch_assoc();
        		$rate=$r['rating'];

        		echo '<div id="h'.$row["hid"].'"style="width: 800px;align-items: center;">';
        		echo '<div style=" padding: 1%; width: 800px; background-color:  #ceff99; margin-top: 5px;height: 200px"><div onclick="ss('.$row["hid"].')"style="width: 30%;float: left; cursor: pointer;"><img src="';
				echo "images/";echo $r['hid'];echo "/1.jpeg";
				echo '" alt="" width="200px" height="200px" style=""></div><div style="float: left; margin-top: 5px; width: 38%;"><div class="na" style="font-size: 32px; height: 50px;">';
				echo $r['name'];
				echo '</div><div style="height: 50px;">';
				echo $r['place'].",";
				echo $r['distance'];
				echo ' km from city center</div><div style="height: 60px;">';
				echo $r['address'];
				echo '</div><div style="height: 50px;">';
				$h=$conn->query("SELECT faci from facility where hid='$row[hid]' order by faci");


				if ($h->num_rows > 0) {
    				// output data of each row
    				while($row1 = $h->fetch_assoc()) {
        				if ($row1[faci]=='b') {
        					echo '<span><img src="images/6.jpg" style="height: 30px;width: 30px;" alt=""></span>';
        				}
        				elseif ($row1[faci]=='p') {
        					echo '<span><img src="images/7.jpg" style="height: 30px;width: 30px;" alt=""></span>';
        				}
        				elseif ($row1[faci]=='s') {
        					echo '<span><img src="images/1.png" style="height: 30px;width: 30px;" alt=""></span>';
        				}
        				elseif ($row1[faci]=='w') {
        					echo '<span><img src="images/2.png" style="height: 30px;width: 30px;" alt=""></span>';
        				}
    				}
				}
				echo '</div></div>';
				
				echo '<div style="font-size: 20px; margin-top: 5px;height: 200px;"><div style="height: 20%;">Rating:';
				echo $rate;
				echo '/10.0</div>';
				$h=$conn->query("SELECT type,price from type where hid=".$row[hid]." order by type");


				if ($h->num_rows > 0) {
    				// output data of each row
    				while($row1 = $h->fetch_assoc()) {
        				if ($row1["type"]=='s') {
        					echo '<div class="s" style="height: 40px;"> Single room: Rs '; echo $row1['price'];echo '</div>';
        				}
        				elseif ($row1["type"]=='d') {
        					echo '<div class="d" style="height: 40px;"> Double room: Rs '; echo $row1['price'];echo '</div>';
        				
        				}
        				elseif ($row1["type"]=='f') {
        					echo '<div class="f" style="height: 40px;"> Family room: Rs '; echo $row1['price'];echo '</div>';
        				
        				}
    				}
    				echo '<button onclick="book(';
    				echo '\'h';echo $row["hid"]; echo '\'';
    				echo ');" >book room</button>';
				}echo "</div></div>";

				echo '<div id="'.$row["hid"].'" style="display: none;height: 320px; width:532px; position: relative; margin-top: 20px;">
					
					<button  onclick="plusDivs(-1)" style="position: absolute;top: 50%; left: 0%;" >&#10094;</button>
					<div id="" style="position: absolute;left: 30px">
		

						<img style=" height: 300px;  width: 500px;" class="mySlides'.$row["hid"].'" src="images/'.$row["hid"].'/1.jpeg" >
						<img style=" height: 300px;  width: 500px;" class="mySlides'.$row["hid"].'" src="images/'.$row["hid"].'/2.jpeg" >
						<img style=" height: 300px;  width: 500px;" class="mySlides'.$row["hid"].'" src="images/'.$row["hid"].'/3.jpeg" >
						<img style=" height: 300px;  width: 500px;" class="mySlides'.$row["hid"].'" src="images/'.$row["hid"].'/4.jpeg" >

		
		
					</div>
					<button style="position: absolute;top: 50%; left: 100%" onclick="plusDivs(1)">&#10095;</button>
				</div>
			</div>';



    		}
		} 
				


		













 ?>


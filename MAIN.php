<?php 
session_start();
if($_SESSION['log_in']!="true"){
	header("location:login.php");
    exit();
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main page</title>
	
</head>
<body style="margin-left: 100px; width: 1150px; adding: 1%;align-content: center; margin-bottom: 200px;">
<style>
		.butt{
			background-color: black;color: white;
		}
		.butt1{
			background-color: white;color: black;
		}
	</style>
<h1>Hello.. <?php include "nam.php"; ?></h1>
	<header style="margin: 2%; align-items: center;">		<nav>
			<label for="" style="font-size: 18px;">Place</label>
			<input type="text" id='p' onkeyup="v()"  list="places" style="font-size: 18px;">
			<datalist id="places">
			<?php include "sa.php";?>
			</datalist>
			<label for="" style="font-size: 18px;">Type of rooms	</label>
			<select name="rooms" id="rt" onchange="v()" style="border: none;font-size: 18px;background-color: black; color: white;">
				<option value="s" selected>single rooms</option>
				<option value="d" >double rooms</option>
				<option value="f">family rooms</option>
			</select>


			<label for="" style="font-size: 18px;">Order By	</label>
			<select name="order" id=or onchange="v()" style="font-size: 18px; border: none; background-color: black; color: white;">
				<option value="1" selected>Rating</option>
				<option value="2" >price</option>
				<option value="3">Distance from city center</option>
			</select>
			<a href="logout.php" style="border-radius: 5px; border: none; background-color: black;color: white;padding: 4px 10px;  font-size: 18px;margin-left: 70px;cursor: pointer;" >logout</a>
		</nav>
	</header>
		<div style="width: 25%; float: left; background-color:  #ceff99; padding: 1%; 	">
			<div>
				<h2>Range:</h2>
			<ul>
				<li><label for="">maximum value</label><br><input style="width: 100px;" type="text" onkeyup="v()" id="max"></li>
				<li><label for="">minimum value</label><br><input style="width: 100px;" type="text" onkeyup="v()" id="min"></li>
			</ul>
			</div>
			<hr>
			<div>
				<h2>Rating:</h2>
				<span onclick="b(this.id); mm=0; v();" value=0 class="butt" id="b1" style="height: 30px;width: 30px;padding: 5px; 	cursor: pointer;">0+</span>
				<span onclick="b(this.id); mm=3; v();" value=3 class="butt" id="b2" style="height: 30px;width: 30px;padding: 5px; 	cursor: pointer;">3+</span>
				<span onclick="b(this.id); mm=5; v();" value=5 class="butt" id="b3" style="height: 30px;width: 30px;padding: 5px;	cursor: pointer;">5+</span>
				<span onclick="b(this.id); mm=7; v();" value=7 class="butt" id="b4" style="height: 30px;width: 30px;padding: 5px; 	cursor: pointer;">7+</span>
				<span onclick="b(this.id); mm=8; v();" value=8 class="butt" id="b5" style="height: 30px;width: 30px;padding: 5px; 	cursor: pointer;">8+</span>
				<span onclick="b(this.id); mm=9; v();" value=9 class="butt" id="b6" style="height: 30px;width: 30px;padding: 5px; 	cursor: pointer;">9+</span> 
				<!--<a href="javascript:v()"><button style="" nclick="v()" value="9.5">9.5+</button></a>
				<button onclick="v()" value="9">9+</button>
				<button onclick="v()" value="8">8+</button>
				<button onclick="v()" value="7">7+</button>
				<button onclick="v()" value="5">5+</button>
				<button onclick="v()" value="0">0+</button>-->
			</div>
			<hr>
			<div>
				<h2>Top options</h2>
				<input id="spa" type="checkbox" onclick="v()">
				<label for="">spa</label><br>
				<input id="wifi" type="checkbox" onclick="v()">
				<label for="">free wifi</label><br>
				<input id="pool" type="checkbox" onclick="v()">
				<label for="">pool</label><br>
				<input id="breakfast" type="checkbox" onclick="v()">
				<label for="">breakfast</label><br>
			</div>
			<hr>
			<div>
				<h2>Search By Name</h2>
				<input type="text" id="nam" onkeyup="v()">
			</div>
			<hr>
		</div>
		<div id="2g" style="width: 800px; margin-left: 30%; align-items: center;">
			<h1 align="center">happy <br> booking</h1>
		</div>
		

<script>
var mm=0;

	var slideIndex;var pre="null";
	var k;var r;

	function ss(m){
		r=m;
		k=document.getElementById(m);
		if (k.style.display=="none") {
			if(pre!="null"){
				pre.style.display="none";
			}
			pre=k;
			k.style.display="block";slideIndex = 1;
			showDivs(slideIndex);
			
			
		}
		else if (k.style.display=="block") {
			k.style.display="none";pre="null";
		}

	}

	function plusDivs(n) {
  		showDivs(slideIndex += n);
	}

	function showDivs(n) {
  		var i;
  		var x = document.getElementsByClassName("mySlides"+r);
  		if (n > x.length) {slideIndex = 1}    
  		if (n < 1) {slideIndex = x.length}
  		for (i = 0; i < x.length; i++) {
     		x[i].style.display = "none";  
  		}
  		x[slideIndex-1].style.display = "block";  
	}


//


	function v(){
		
		var place=document.getElementById('p').value;
		var roomType=document.getElementById('rt').value;
		var order=document.getElementById('or').value;
		var maxx=document.getElementById('max').value;
		var min=document.getElementById('min').value;
		var nam=document.getElementById('nam').value;
		var spa=document.getElementById('spa').checked;
		var wifi=document.getElementById('wifi').checked;
		var pool=document.getElementById('pool').checked;
		var bf=document.getElementById('breakfast').checked;
		//alert(nam);
		var xmlhttp = new XMLHttpRequest();
  			xmlhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      			//myFunction(this);
      			
      			document.getElementById("2g").innerHTML=this.responseText;
    		}
  		};
  		var para="place="+place+"&roomType="+roomType+"&order="+order+"&maxx="+maxx+"&min="+min+"&nam="+nam+"&spa="+spa+"&wifi="+wifi+"&pool="+pool+"&bf="+bf+"&butt="+mm;
  	xmlhttp.open("POST", "main2.php", true);
  	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xmlhttp.send(para);
		
	}
	
	
	function b(n){
		var s=document.getElementsByClassName('butt');
		for (var i = 0; i < s.length; i++) {
			if(s[i].getAttribute('id')>=n){
				s[i].style.backgroundColor= 'black';
				s[i].style.color='white';
			}
			else{
				s[i].style.backgroundColor= 'white';
				s[i].style.color='black';
			}
		}
	}

	function book(h){
		//alert(h);
		var hh=document.getElementById(h);
		var na=hh.getElementsByClassName("na")[0];
		var s=document.getElementById("rt");
		var op=s.options[s.selectedIndex].value;
		var pr=hh.getElementsByClassName(op);
		var c=confirm("Conformation to book\n"+na.innerHTML+"\n"+pr[0].innerHTML);
		if(c==true)
			window.location.href="pay.php";
	}

	
</script>

</body>
</html>



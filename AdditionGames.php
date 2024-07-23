<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title> Math Addition Game </title>
	
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
		}
		
		.main-container{
			width: 100%;
			height: 100vh;
			background: #fff;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		
		.main-box{
			width: 400px;
			height: 400px;
			background: #83d6ef;
			display: flex;
			flex-direction: column;
			align-items: center;
			border-radius: 10px;	
		}
		
		.show-answer{
			width: 100%;
			height: 55px;
			background: #fb6868;
			margin: 0px 0px 60px 0px;
			border-top-right-radius: 10px;
			border-top-left-radius: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
			color: #fff;
			font-size: 18px;
			font-weight: 500;
		}
		
		.box1 {
			display: flex;
		}
		
		.intext11,#intext2{
			width: 76px;
			font-size: 20px;
			font-weight: 600;
			height: 55px;
			padding: 0px 10px;
			text-align: center;
			border: none;
			background: #fff;
			box-shadow: 1px 1px 0px #999,
			2px 2px 0px #999,
			3px 2px 0px #999,
			4px 4px 0px #999,
			5px 5px 0px #999;
			
		}
		
		.add-s{
			margin: 13px 20px 12px 21px;
			font-size: 25px;
		}
		
		#intext2{
			width: 180px;
			height: 35px;
			margin: 30px 0px;
			padding: 0px 15px;
			text-align: center;
			font-size: 20px;
			font-weight: 600;
			border: none;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		
		.btn{
			padding: 8px 20px;
			border: none;
			font-size: 16px;
			color: #fff;
			background: #fb6868;
			box-shadow: 1px 1px 0px #999;
			2px 2px 0px #999,
			3px 2px 0px #999,
			4px 4px 0px #999,
			5px 5px 0px #999;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		
		.main h1{
			margin: 30px 0px;
			font-size: 25px;
		}
		.main h1 span{
			color: #fb6868;
			font-size: 25px;
		}
		
		
	</style>
	
</head>
<body>

	<!-- Main Container -->
	<div class="main-container">
		<div class="main"> 
		
			<!-- Heading --> 
			<h1> Math Addition <span> Quiz Game :) </span> </h1>
			
			<!-- Main Box --> 
			<div class="main-box">
				<div class="show-answer"><span id="ans"></span></div>
				
				<div class="box1">
					<div class="box-col">
						<input type="textf" id="intext1" class="intext11">
					</div>
					
					<div class="add-s">
						<p>+</p>
					</div>
					
					<div class="box-col">
						<input type="textf" id="intext" class="intext11">
					</div>
					
				</div>
				
				<!-- text input -->
				<div class="box2">
					<input tpye="text" id="intext2">
				</div>
				
				<!-- button -->
				
				<div class="box2">
					<button class="btn" onclick="Game()"> Check Answer </button>
				</div>
				
			</div>
		</div>
	</div>
	
	<script>
		let n1 = Math.floor(Math.random()*20+1);
		let n2 = Math.floor(Math.random()*20+1);
		
		document.getElementById("intext").value = n1;
		document.getElementById("intext1").value = n2;
		
		let adds= n1 + n2;
		
		function Game(){
			var user= document.getElementById("intext2").value;
			
			if( user == adds) {
				document.getElementById("ans").innerHTML = "Well Done! Your Answer is Correct";
			}else{
				document.getElementById("ans").innerHTML = "Correct Answer " + adds + ". Try Again"; 
			}
			
			var user= document.getElementById("intext2").value = "";
			
			n1 = Math.floor(Math.random()*20+1);
			n2 = Math.floor(Math.random()*20+1);
			
			document.getElementById("intext").value = n1;
			document.getElementById("intext1").value = n2;
			
			adds= n1 + n2;
			
		}
		
	</script>
	
</body>
</html>

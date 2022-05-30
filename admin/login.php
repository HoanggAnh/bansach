<?php
ob_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>	
	<title>Login</title>
	<script src="jQuery/jquery-3.1.1.min.js" type="text/javascript"></script>

	<style>

body{
			background-color: black;
		}

		#box{
			height: 2px;
			width: 1px;
			padding: 5px;
			background-color: #fcc39b;
			border-radius: 10px;
			line-height:90px;
			box-shadow: 0 0 15px #f3906c;
		}
		
		#in{
			width: 90%;
			height: 50px;
			border-radius: 10px;
			padding: 8px;
			border : 4px solid #f3906c;
			background-color: #333333;
			color: white;
		}
		#in:focus{
			border:6px solid #00cccc;
		}
		#inBtn{
			width: 90%;
			height: 50px;
			border-radius: 10px;
			line-height:10px;
			border : 4px solid #00cccc;
			background-color: #333333;
			color:white;
			cursor: pointer;
		}
		#copy{
			color: #00cccc;
			text-align: center;
			font-style: italic;
		}
		footer{
			position:fixed;		    
		    bottom:0px;
		    left:0px;
		    right:0px;
		    margin-bottom:0px;
		}
		hr{
			color: black;
		}
	</style>


</head>
<body background="https://i.pinimg.com/originals/bc/3e/96/bc3e9619b024972d991057ad7ddedf37.jpg" style="background-repeat:no-repeat;background-size:cover;" >
	<br>
	<hr>
	<h1 align="center" style="color:#f3906c">Đăng Nhập Trang Quản Trị</h2>
	<hr>
	<br>
	<form action="<?php include "loginAdmin.php" ?>" method="post">
		<center>
			<!-- <div id="circle"> -->
				<h2 id="blinking" style="color: lavender">Please Login Here</h2>
				<div id="box">
					<input type="text" name="txtdangnhap" id="in" placeholder="Username" style="margin-top: 50px"><br>
					<input type="password" name="txtmatkhau" placeholder="Password" id="in" style="margin-top: 10px">
					<button type="submit" name="dnhapadmin"class="btn" style="background-color: black; color: #fcc39b; margin-top: 50px">Login!</button>
					<p style="color:red"><?php echo  $kq ?></p>
				</div>
			<!-- </div> -->
		</center>
	</form>
	<br><br><br><br>
	<script src="script.js"></script>
	<!-- <hr>
		<p id="footer">Misfar ©</p>
	<hr> -->
	<footer>
		<hr>
			<p id="copy" style="color: #f3906c; font-size: 2rem"><b>ThreeFairies Shop ©</b></p>
		<hr>
	</footer>
</body>
</html>

<?php ob_end_flush(); ?>
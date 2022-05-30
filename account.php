<?php
ob_start();
session_start();
?>

<?php include "header.php" ?>


<?php
$tk = "";
$mk = "";
$kq = "";
if (isset($_POST['submit'])) {
	require 'inc/config.php';
	$tk = $_POST['txtus'];
	$mk = $_POST['txtem'];
	$sql = "SELECT * FROM users where email = '$tk'  and password = '$mk'  ";
	$result = $conn->query($sql);
	// echo  $mk;
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$_SESSION['txtus'] = $tk;
			$_SESSION['HoTen'] = $row["fullname"];
			$_SESSION['email'] = $row["email"];
			$_SESSION['dienthoai'] = $row["phone"];
			header('Location: cart.php');  
			$row = $result->fetch_assoc();
		}
	} else {
		$kq = "Thông tin không đúng vui lòng kiềm tra lại";
	}
}
?>
<?php
$name = "";
$email = "";
$dt = "";
$mk = "";
$kqdk = "";
$repass = "";
$address = "";

if (isset($_POST['dangky'])) {
	require 'inc/config.php';
	$name  = $_POST['fullname'];
	$email = $_POST['email'];
	$dt = $_POST['phone'];
	$mk = $_POST['password'];
	$repass = $_POST['repass'];
	$address = $_POST['address'];
	if ($repass != $mk) {
		$kqdk = "Mật khẩu nhập lại không chính xác";
	} else {
		$sql = "INSERT INTO users (email,password,fullname,address,phone) 
        VALUES ('$email','$mk' ,'$name', '$address', '$dt') ";
		// echo  $mk;
		if (mysqli_query($conn, $sql)) {
			$name = "";
			$email = "";
			$dt = "";
			$mk = "";
			$repass = "";
			$address = "";
			$kqdk = "Đăng ký thành công";
		} else {
			$kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
		}
	}


	mysqli_close($conn);
}
?>


<!-- Main css -->
<link rel="stylesheet" href="css/form.css">
</head>

<body>
	<div class="main" style="background-color: #525e6c">


		<section class="signup">
			<div class="container">
				<div class="signin-content">
					<div class="signin-form" style="padding-top:60px">
						<h2 class="form-title">Log In</h2>
						<form name="form1" id="ff1" method="POST" action="#">
							<div class="form-group">
								<label for="Email"><i class="zmdi zmdi-account material-icons-name" style="margin-left:10px"></i></label>
								<input type="email" class="form-control" placeholder="Email" name="txtus" />
							</div>
							<div class="form-group">
								<label for="pass"><i class="zmdi zmdi-lock" style="margin-left:10px"></i></label>
								<input type="password" class="form-control" placeholder="Password" name="txtem" />
							</div>
							<div class="form-group">
								<input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
								<label for="remember-me" class="label-agree-term"><span><span></span></span>Remmeber Me?</label>
							</div>
							<div class="form-group form-button">
								<input type="submit" name="submit" id="login" class="form-submit" value="Log in" style="font-size:1rem">
							</div>
							<P style="color:red"><?php echo $kq; ?></p>
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="images/form1.jpg" alt="sing up image"></figure>
						<a class="signup-image-link" href="index.php" style="font-size:2rem; text-decoration:none"><span style="color: #323741;">Book</span><span style="color: #f38556;">Store</span></a>
					</div>
				</div>
			</div>
		</section>

		<!-- Sign up Form -->
		<section class="sign-up">
			<div class="container">
				<div class="signup-content">
					<div class="signup-image">
						<figure><img src="images/form2.jpg" alt="sing up image"></figure>
						<a class="signup-image-link" href="index.php" style="font-size:2rem; text-decoration:none"><span style="color: #323741;">Book</span><span style="color: #f38556;">Store</span></a>
					</div>

					<div class="signup-form">
						<h2 class="form-title">Sign Up</h2>
						<form name="form2" id="ff2" method="post" action="#">
							<div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name" style="margin-left:10px"></i></label>
								<input type="text" class="form-control" placeholder="Full Name" name="fullname" id="firstname" value="<?php echo $name; ?>" required>
							</div>
							<div class="form-group">
								<label for="email"><i class="zmdi zmdi-email" style="margin-left:10px"></i></label>
								<input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" required>
							</div>
							<div class="form-group">
								<label for="mobile"><i class="zmdi zmdi-mobile" style="margin-left:10px"></i></label>
								<input type="number" class="form-control" placeholder="Mobile" name="phone" id="phone" value="<?php echo $dt; ?>" required>
							</div>
							<div class="form-group">
								<label for="address"><i class="zmdi zmdi-mobile" style="margin-left:10px"></i></label>
								<input type="text" class="form-control" placeholder="Address" name="address" id="address" value="<?php echo $address; ?>" required>
							</div>
							<div class="form-group">
								<label for="pass"><i class="zmdi zmdi-lock" style="margin-left:10px"></i></label>
								<input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php echo $mk; ?>" required>
							</div>
							<div class="form-group">
								<label for="re-pass"><i class="zmdi zmdi-lock-outline" style="margin-left:10px"></i></label>
								<input type="password" class="form-control" placeholder="Repeat Your Password" name="repass" id="repass" value="<?php echo $repass; ?>" required>
							</div>

							<div class="form-group">
								<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
								<label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
							</div>
							<div class="form-group form-button">
								<input type="submit" name="dangky" class="form-submit" value="Register" style="font-size:1rem">
							</div>
							<P style="color:blue"><?php echo $kqdk; ?></p>
						</form>
					</div>
				</div>
			</div>
		</section>

	</div>


	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
<?php ob_end_flush(); ?>
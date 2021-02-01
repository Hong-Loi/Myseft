<?php
session_start();
spl_autoload_register(function($class_name){
    require './app/models/' . $class_name . '.php';
});
$accountModel = new AccountModel();
$accountList = $accountModel->getAccount();
if(isset($_POST['re'])){
	$password=$_POST['password'];
    $rePassword=$_POST['rePassword'];
    if($password==$rePassword){
        $id=$_SESSION['newPassword'];
        if($accountModel->updatePassword($password,$id)){
            phpAlert("Password updated successfull^^");
	?>
	<!-- --them thong bao khi dang ky thanh cong -->
	<script type="text/javascript">
	
	function delayer(){
		window.location = "http://localhost/Myself/login.php";
	}
	//-->
	</script>
	</head>
	<body onLoad="setTimeout('delayer()', 0)">
	<?php
        }
    }
    else{
        phpAlert("Both password not the same!");
    }
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
		<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="newPassword.php" method="post">
					 

					<span class="login100-form-title p-b-34 p-t-27">
						forget password 
					</span>
					   <input class="input100" type="password" name="password" placeholder="New password" required>
					   <input class="input100" type="password" name="rePassword" placeholder="Confirm password" required>
						<!-- <span class="focus-input100" data-placeholder="&#xf207;"></span> -->

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="re">Submit</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" href="index.html">
							Sign In 
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
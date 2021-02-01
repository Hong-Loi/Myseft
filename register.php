<?php
spl_autoload_register(function($class_name){
    require './app/models/' . $class_name . '.php';
});
$accountModel = new AccountModel();
if(isset($_POST['ok'])){
	if($_POST['password']==$_POST['repassword']){
		if (is_uploaded_file($_FILES['photo']['tmp_name']) && move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images/' . time() . $_FILES['photo']['name'])) {

			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$photo = time() . $_FILES['photo']['name'];
	
			if($accountModel->createAccount($name,$email,$username,$password,$photo)) {
				phpAlert("Register account successfull^^");
        ?>
        <!-- --them thong bao khi dang ky thanh cong -->
        <script type="text/javascript">
        
        function delayer(){
            window.location = "http://localhost/Myself/login";
        }
        //-->
        </script>
        </head>
        <body onLoad="setTimeout('delayer()', 0)">
        <?php
			}
		}
	}
	else{
		phpAlert("The password is not the same^^");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
				<form action="register.php"  class="login100-form validate-form" method="post" enctype="multipart/form-data">
					 

					<span class="login100-form-title p-b-34 p-t-27">
						Sign Up 
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Full Name">
                            <input class="input100" type="text" name="name" placeholder="Full Name" required>
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Email">
                                <input class="input100" type="email" name="email" placeholder="Email" required>
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                            </div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Repeat password">
                            <input class="input100" type="password" name="repassword" placeholder="Repeat Password" required>
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
						<div class="wrap-input100 validate-input" data-validate="">
                            <input class="input100" type="file" name="photo" placeholder=""required>
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name=" I Agree to terms of user ">
						<label class="label-checkbox100" for="ckb1">
                                I agree to <b>the terms of user</b> 
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="ok">
							Sign Up
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="index.html">
							-> sign in 
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
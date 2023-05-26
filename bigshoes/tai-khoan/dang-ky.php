<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/css/main.css">
	<!--===============================================================================================-->
	<link rel="shortcut icon" type="image/png" href="../css/trang-chu/img/TBT.png" />

</head>

<body>

	<!-- CODE XỬ LÝ PHP -->
	<?php
	require_once('../admin/dao/khach-hang.php');

	extract($_REQUEST);
	if (array_key_exists('btn_register', $_REQUEST)) {

			require('../phpmailer/src/PHPMailer.php');
            require('../phpmailer/src/Exception.php');
            require('../phpmailer/src/SMTP.php');
            // send mail
            // $config = array();
            $protocol = 'smtp';
            $host = 'ssl://smtp.gmail.com';
            $smtp_username = 'vinhbao320@gmail.com';
            $smtp_password = 'Nguyenvinhbao320';
            $charset = 'utf-8';
            $encryption = 'tls';
            $to_email = $email;
            $port = 587;
            $subject = 'BigshoesS';
            $message = 'Chúc mừng bạn đã đăng ký tài khoản thành công !';
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPSecure = $encryption;;
            $mail->Username = $smtp_username;
            $mail->Password = $smtp_password;
            // Thiết lập địa chỉ người gửi, người nhận và tiêu đề email
            $mail->setFrom($smtp_username);
            $mail->addAddress($to_email);
            $mail->Subject = $subject;
            // Thiết lập nội dung email
            $mail->Body = $message;
		khach_hang_insert($ma_kh, $ho_ten, md5($mat_khau), $email, $sdt, $dia_chi);
		$mail->send($to_email, $subject, $message);
		$message = 'Mời bạn đăng nhập để mua hàng !';
		echo "<SCRIPT> 
        alert('$message')
        window.location.replace('dang-nhap.php');
    	</SCRIPT>";
		unset($ma_kh, $ho_ten, $mat_khau, $email, $sdt, $dia_chi);
	}
	?>
	<!-- -->

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../css/tai-khoan/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-logo">
						<a href="../../bigshoes/trang-chinh/index.php"><img src="../css/tai-khoan/images/TBT.png" width="80px" alt=""></a>
					</span>


					<span class="login100-form-title p-b-34 p-t-27">
						ĐĂNG KÝ
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="ma_kh" placeholder="Tên đăng nhập">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter name">
						<input class="input100" type="text" name="ho_ten" placeholder="Họ và tên">
						<span class="focus-input100" class='fas' data-placeholder="&#xf18e;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="mat_khau" placeholder="Mật khẩu">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter phone">
						<input class="input100" type="text" name="sdt" placeholder="Số điện thoại">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter address">
						<input class="input100" type="text" name="dia_chi" placeholder="Địa chỉ">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn_register">
							XÁC NHẬN
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="dang-nhap.php">
							Đăng nhập?&nbsp;
						</a>OR
						<a class="txt1" href="quen-mk.php">
							&nbsp;Quên mật khẩu?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/bootstrap/js/popper.js"></script>
	<script src="../css/tai-khoan/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/daterangepicker/moment.min.js"></script>
	<script src="../css/tai-khoan/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/js/main.js"></script>

</body>

</html>
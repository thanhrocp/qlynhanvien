<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta href="{{asset('')}}">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="master/login/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="master/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="master/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/css/util.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/docs/css/sweetalert2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="master/login/css/main.css">
	<!--===============================================================================================-->
	<link href="master/docs/css/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(master/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
				@if(session('message'))
				<div class="alert alert-danger alert-dismissible text-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Thông báo !! {{session('message')}}
				</div>
				@endif
				<form class="login100-form validate-form" method="POST">
					{{csrf_field()}}
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Nhập email">
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
						@if($errors->has('password'))
						<p style="color:red">
							{{$errors->first('password')}}
						</p>
						@endif
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="master/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/bootstrap/js/popper.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/daterangepicker/moment.min.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="master/login/js/main.js"></script>
	<!--===============================================================================================-->
	<script src="master/docs/js/sweetalert2.min.js"></script>
	<!--===============================================================================================-->
	@include('sweet::alert')
</body>
</html>
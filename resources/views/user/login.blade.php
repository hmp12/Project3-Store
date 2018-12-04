<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
		@include ('common.head')
	</head>	

	<body>
		<div class="container">
			<div class="row">
				<form action="{{ action('UserController@login') }}" method="post" class="login-box col-5 offset-3">
					@csrf
					<h3 class="text-center">Login</h3>
					<span class="error">{{ (isset($error)) ? $error : ''}}</span>
					<p>User name: </p>
					<input type="text" class="form-control" placeholder="Enter user name" value="{{ (isset($username)) ? $username : ''}}" name="username" id="usr">
					<p>Password: </p>
					<input type="password" class="form-control" placeholder="Enter password" value="{{ (isset($pass)) ? $pass : ''}}" name="pass" id="pass">
					<button type="submit" class="btn btn-success float-right" id="login_bt">Login</button>
					<button type="button" class="btn btn-primary float-right" onclick="location.href='{{ url('/') }}/user/signup'" id="signup_bt">Signup</button>
				</form>
			</div>			
		</div>
	</body>
</html>
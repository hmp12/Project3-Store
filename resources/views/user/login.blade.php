<!DOCTYPE html>

<html>
	<head>
		<title>Login</title>
		@include ('common.head')
	</head>	

	<body>
		@include ('common.top-bar')
		<div class="login">
			<div class="top_box">
				<img src="{{ url('/') }}/img/gaugau.png" height="100%">
			</div>
			<form action="{{ action('UserController@login') }}" method="post" class="login_box">
				@csrf
				<span class="error">{{ (isset($error)) ? $error : ''}}</span>
				<h4>User name: </h4>
				<input type="text" placeholder="Enter user name" value="{{ (isset($username)) ? $username : ''}}" name="username" id="usr">
				<h4>Password: </h4>
				<input type="password" placeholder="Enter password" value="{{ (isset($pass)) ? $pass : ''}}" name="pass" id="pass">
				<button type="submit" id="login_bt">Login</button>
				<button type="button" onclick="location.href='signup.php'" id="signup_bt">Signup</button>
			</form>	
			<div class="bottom_box">
				<p class="inline">Sign in with: </p>
				<img src="../img/google.svg" height="60%" class="logo">
				<img src="../img/facebook.svg" height="60%" class="logo">
				<img src="../img/twitter.svg" height="60%" class="logo">
			</div>		
		</div>
	</body>
</html>
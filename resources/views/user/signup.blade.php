<html>
	<head>
		<title>Sign up</title>
		@include ('common.head')
	</head>

	<body>
		<div class="signup">
			<div class="row">
				<form action="{{ action('UserController@signUp') }}" method="post" class="signup-box col-4 offset-4">
					@csrf
					<span class="error">* is required</span>
					<p>Full name: <span class="error">* {{ (isset($fullnameError)) ? $fullnameError : ''}}</span></p>
					<input type="text" class="form-control" placeholder="Enter your name" value="{{ (isset($fullname)) ? $fullname : ''}}" name="fullname" id="name">
					<p>User name: <span class="error">* {{ (isset($usernameError)) ? $usernameError : ''}}</span></p>
					<input type="text" class="form-control" placeholder="Enter user name" value="{{ (isset($username)) ? $username : ''}}" name="username" id="usr">
					<p>Email: <span class="error">* {{ (isset($emailError)) ? $emailError : ''}}</p>
					<input type="email" class="form-control" placeholder="Enter user name" value="{{ (isset($email)) ? $email : ''}}" name="email" id="email">
					<p>Password: <span class="error">* {{ (isset($passError)) ? $passError : ''}}</p>
					<input type="password" class="form-control" placeholder="Enter password" name="pass" id="pass">
					<p>Confirm Password: <span class="error">* {{ (isset($rePassError)) ? $rePassError : ''}}</p>
					<input type="password" class="form-control" placeholder="ReEnter password" name="rePass" id="re_pass">
					<p>Gender</p>
					<input type="radio" name="gender" {{ (isset($gender) && $gender=="male") ? 'checked' : ''}} value="male">Male
					<input type="radio" name="gender" {{ (isset($gender) && $gender=="female") ? 'checked' : ''}} value="female">Female
					<button type="submit" class="btn btn-primary float-right" id="signup_bt">Signup</button>
				</form>
			</div>	
		</div>		
	</body>
</html>
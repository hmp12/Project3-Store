<html>
	<head>
		<title>Sign up</title>
		@include ('common.head')
	</head>

	<body>
		<div class="signup">
			<form action="{{ action('UserController@signUp') }}" method="post" class="signup_box">
				@csrf
				<span class="error">* is required</span>
				<p>Full name: <span class="error">* {{ (isset($fullnameError)) ? $fullnameError : ''}}</span></p>
				<input type="text" placeholder="Enter your name" value="{{ (isset($fullname)) ? $fullname : ''}}" name="fullname" id="name">
				<p>User name: <span class="error">* {{ (isset($usernameError)) ? $usernameError : ''}}</span></p>
				<input type="text" placeholder="Enter user name" value="{{ (isset($username)) ? $username : ''}}" name="username" id="usr">
				<p>Email: <span class="error">* {{ (isset($emailError)) ? $emailError : ''}}</p>
				<input type="email" placeholder="Enter user name" value="{{ (isset($email)) ? $email : ''}}" name="email" id="email">
				<p>Password: <span class="error">* {{ (isset($passError)) ? $passError : ''}}</p>
				<input type="password" placeholder="Enter password" name="pass" id="pass">
				<p>Confirm Password: <span class="error">* {{ (isset($rePassError)) ? $rePassError : ''}}</p>
				<input type="password" placeholder="ReEnter password" name="rePass" id="re_pass">
				<p>Gender</p>
				<input type="radio" name="gender" {{ (isset($gender) && $gender=="male") ? 'checked' : ''}} value="male">Male
				<input type="radio" name="gender" {{ (isset($gender) && $gender=="female") ? 'checked' : ''}} value="female">Female
				<button type="submit" id="signup_bt">Signup</button>
			</form>		
		</div>	
	
	</body>
</html>
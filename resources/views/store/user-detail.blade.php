@if (!empty($user))
	@php	
		$name = $user->name;
		
		if (!empty($user->avatar)) {
			$avatar = $user->avatar;
		}
		else {
			$avatar = "img/user.svg";
		}
		$phone = $user->phone;
	@endphp
	<img width="100px" src="{{ url('/') }}/{{ $avatar }}">
	<h4>{{ $name }}</h4>
	<h4>0{{ $phone }}</h4>
@else
	<a href="{{ url('/') }}/user/login">
		<i class="fa fa-sign-in"> Đăng nhập</i>
	</a>
@endIf
<div class="nar-bar">
	<ul class="float-left">
		<li id="sidebarToggle"><i class="fa fa-bars"></i></li>
		<li id="logo"><a href="{{ url('/') }}/"><img height="50px" width="150px" src="{{ url('/') }}/img/gaugau4.png"></a></li>
	</ul>

	<ul class="float-right">
		<li id="hide-top"><i class="fa fa-chevron-up"></i></li>
		<li id="show-top"><i class="fa fa-chevron-down"></i></li>
		<li id="user">
			<img height="60%" width="60%" src="{{ url('/') }}/img/user.svg">
			<div class="dropdown">
			</div>
		</li>
		<li><a href="{{ route('logout') }}" id="login_out">
			@if (Auth::check())
				<i class="fa fa-sign-out-alt"></i>
			@else
				<i class="fa fa-sign-in-alt"></i>
			@endif
		</a></li>
		<li id="noti"><i class="fa fa-bell"></i></li>
		<li id="cart">
			<i class="fa fa-shopping-cart"></i>
			<div class="dropdown">
			</div>
		</li>
		<li id="compare">
			<i class="fa fa-columns"></i>
			<div class="dropdown">
			</div>
		</li>
		<li class="pt-2" id="search">
			<input type="text" name="search" class="form-control float-right">
			<div class="dropdown">
			</div>
		</li>
	</ul>
</div>

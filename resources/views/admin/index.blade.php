<!DOCTYPE HTML>
<html>
	<head>
		<title>Gâu Gâu Admin</title>
		@include ('common.head')
		<link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
		<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
	</head>

	<body>
		<div class=error></div>
		@include ('common.nav-bar-admin')
		
		<div id="wrapper">
			@include ('common.side-bar-admin')
			<div class="content-wrapper">
				<script type="text/javascript">
					var tab = "{{$tab}}";
				</script>
				<div class="container-fluid">
					@include ('admin.'.$tab)
				</div>
			</div>
		</div>
		
		<script src="{{ asset('js/sb-admin.min.js') }}"></script>
	</body>
</html>
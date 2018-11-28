<!DOCTYPE HTML>
<html>
	<head>
		<title>Gâu Gâu Admin</title>
		@include ('common.head')
		<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
	</head>

	<body>
		<div class=error></div>
		@include ('common.top-bar')
		@include ('common.nar-bar-store')
		
		<div class="page">
			@include ('common.side-bar-admin')
			<div class="content">
				<script type="text/javascript">
					var tab = "{{$tab}}";
				</script>
				@include ('admin.'.$tab)
			</div>
		</div>
	</body>
</html>
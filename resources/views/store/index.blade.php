<!DOCTYPE HTML>
<html>
	<head>
		<title>Store</title>
		@include ('common.head')
		<link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
		<script type="text/javascript" src="{{ asset('js/store.js') }}"></script>
	</head>

	<body>
		<div class=error></div>
		@include ('common.nav-bar-store')
		<div id="wrapper">
			@include ('common.side-bar-store')
			<div class="content-wrapper store">				
				<script type="text/javascript">
					var user_id = "{{ isset($user) ? $user->id : 0 }}";
					var tab = "{{ $tab }}";
				</script>
				<div class="modal purchase">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<h4 class="modal-title">Thanh toán</h4>
								<button type="button" class="close" data-dismiss="modal purchase">&times;</button>
							</div>
							

							<div class="modal-body">
								
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="btn-purchase">Thanh toán</button>
							</div>
							
						</div>
					</div>
				</div>
				<div class="container-fluid">
					@include ('store.'.$tab)
				</div>
			</div>
			
		</div>
		@include ('common.footer')
		<script src="{{ asset('js/sb-admin.min.js') }}"></script>
	</body>
</html>
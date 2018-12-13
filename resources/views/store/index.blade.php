<!DOCTYPE HTML>
<html>
	<head>
		<title>Gâu Gâu Store</title>
		@include ('common.head')
		<script type="text/javascript" src="{{ asset('js/store.js') }}"></script>
	</head>

	<body>
		<div class=error></div>
		@include ('common.nav-bar-store')
		<div class="store page">
			@include ('common.side-bar-store')
			<div class="content">				
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
				@include ('store.'.$tab)
			</div>
			
		</div>
		<div class="support-box">
			<button class="support-bt"><h4>Nhận hỗ trợ tự động</h4></button>
			<div class="chat-box">
				<div class="messages">
					
				</div>
				<div class="input-box">
					<form method="post" action="" onsubmit="return false;">
						<input type="text" placeholder="Say someting" id="chat-input">
						<button type="submit" id="send-bt">Gửi</button>
					</form>
				</div>
			</div>
		</div>
		@include ('common.footer')
	</body>
</html>
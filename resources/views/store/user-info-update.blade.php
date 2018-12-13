<!DOCTYPE HTML>
<html>
	<head>
		<title>Store</title>
		@include ('common.head')
		<link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
		<script type="text/javascript" src="{{ asset('js/store.js') }}"></script>
	</head>

	<body>
		<div class="row">
			<form action="" enctype="multipart/form-data" method="post" class="col-7 offset-3">
				@csrf
				<div class="row">
					<div class="col-8">
						<p>Name <span class="error">{{ (isset($nameError)) ? $nameError : '' }}</p>
						<input type="text" class="form-control" width="900px" name="name" value="{{ (isset($name)) ? $name : '' }}" placeholder="Type name in here" class="text" id="name">
						<p>Address <span class="error">{{ (isset($addressError)) ? $addressError : '' }}</p>
						<input type="text" class="form-control" name="address" value="{{ (isset($address)) ? $address : '' }}" placeholder="Type address in here" class="text" id="address">
						<p>Phone <span class="error">{{ (isset($phoneError)) ? $emailError : '' }}</p>
						<input type="number" class="form-control" name="phone" value="{{ (isset($phone)) ? $phone : '' }}" placeholder="Type phone in here" class="text" id="phone">
						<input type="submit" value="Update" class="btn btn-success btn-lg">
					</div>		
			</form>
		</div>
	</body>
</html>
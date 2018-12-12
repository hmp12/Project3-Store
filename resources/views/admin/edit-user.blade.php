<div class="add">
	<div class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close fa fa-times"></span>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button class="button" id="choose">Choose</button>
			</div>
		</div>
	</div>

	<h1>Edit User</h1>
	<button class="btn btn-basic btn-lg" value="user" id="back">Back</button>
	<form action="" enctype="multipart/form-data" method="post">
		@csrf
		<div class="row">
			<div class="col-5">
				<p>Fullname <span class="error">{{ (isset($fullnameError)) ? $fullnameError : '' }}</p>
				<input type="text" class="form-control" width="900px" name="fullname" value="{{ (isset($fullname)) ? $fullname : '' }}" placeholder="Type fullname in here" class="text" id="fullname">
				<p>Username <span class="error">{{ (isset($usernameError)) ? $usernameError : '' }}</p>
				<input type="text" class="form-control" name="username" value="{{ (isset($username)) ? $username : '' }}" placeholder="Type username in here" class="text" id="username">
				<p>Email <span class="error">{{ (isset($emailError)) ? $emailError : '' }}</p>
				<input type="text" class="form-control" name="email" value="{{ (isset($email)) ? $email : '' }}" placeholder="Type email in here" class="text" id="email">
				<p>Password <span class="error">{{ (isset($passError)) ? $passError : '' }}</p>
				<input type="text" class="form-control" name="pass" value="{{ (isset($pass)) ? $pass : '' }}" placeholder="Type password in here" class="text" id="pass">
				<p>Role</p>
				<select name="role" class="text">
					<option value="0" disabled selected hidden>Choose role here</option>
					@foreach ($roles as $role)
						<option value="{{ $role->id }}">{{ $role->title }}</option>
					@endforeach				
				</select>
				<input type="submit" value="Update" class="btn btn-success btn-lg">
			</div>
		
	</form>
</div>
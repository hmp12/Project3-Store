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

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin/user">User</a>
		</li>
		<li class="breadcrumb-item active">Edit</li>
	</ol>
	<button class="btn btn-basic btn-lg" value="user" id="back">Back</button>
	<form action="" enctype="multipart/form-data" method="post">
		@csrf
		<div class="row">
			<div class="col-5">
				<p>Name <span class="error">{{ (isset($nameError)) ? $nameError : '' }}</p>
				<input type="text" class="form-control" width="900px" name="name" value="{{ (isset($name)) ? $name : '' }}" placeholder="Type name in here" class="text" id="name">
				<p>Username <span class="error">{{ (isset($usernameError)) ? $usernameError : '' }}</p>
				<input type="text" class="form-control" name="username" value="{{ (isset($username)) ? $username : '' }}" placeholder="Type username in here" class="text" id="username">
				<p>Email <span class="error">{{ (isset($emailError)) ? $emailError : '' }}</p>
				<input type="text" class="form-control" name="email" value="{{ (isset($email)) ? $email : '' }}" placeholder="Type email in here" class="text" id="email">
				<p>Role</p>
				<select name="role" class="form-control">
					<option value="0" disabled selected hidden>Choose role here</option>
					@foreach ($roles as $role)
						<option value="{{ $role->id }}" {{ (isset($roleId) && $role->id == $roleId) ? 'selected' : '' }}>{{ $role->title }}</option>
					@endforeach				
				</select>
				<input type="submit" value="Update" class="btn btn-success btn-lg">
			</div>
		
	</form>
</div>
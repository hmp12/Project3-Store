<div class="users">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">User</li>
	</ol>
	<div>
		<button class="btn btn-success btn-lg" value="user" id="add"><i class="fa fa-plus"></i>Add</button>
		<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-refresh"></i>Reload</button>
		<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i>Delete</button>
	</div>
	<table class="table">
		<tr>
			<td><input type="checkbox" id="all"></td>
			<td><strong>ID</strong></td>
			<td><strong>Username</strong></td>
			<td><strong>Fullname</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Role</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		@foreach ($users as $user)				
			<tr>
				<td><input type="checkbox" value="{{ $user->id }}"></td>
				<td>{{ $user->id }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->fullname }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->role_id }}</td>
				<td>
					<button value="{{ $user->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-pencil-square-o"></i></button>
					<button value="{{ $user->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
				</td>
			</tr>				
		@endforeach
	</table>
</div>
<ul class="pagination justify-content-center">
	@for ($i = 1; $i < $maxPage; $i++)
		<li class="page-item {{ $i == $page ? 'active' : '' }}">
			<a href="{{ url('/') }}/admin/user/page/{{ $i }}" class="page-link">{{ $i }}</a>
		</li>
	@endfor
</ul>
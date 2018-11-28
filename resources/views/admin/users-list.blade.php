<div class="users">
	<h1>Users</h1>
	<div>
		<button class="button" value="user" id="add"><i class="fa fa-plus"></i>Add</button>
		<button class="button" id="reload"><i class="fa fa-refresh"></i>Reload</button>
		<button class="button delete" id="delete"><i class="fa fa-trash"></i>Delete</button>
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
					<button value="{{ $user->id }}" class="sbutton edit"><i class="fa fa-pencil-square-o"></i></button>
					<button value="{{ $user->id }}" class="sbutton delete"><i class="fa fa-trash"></i></button>
				</td>
			</tr>				
		@endforeach
	</table>
</div>
<div class="page_number">
	@for ($i = 1; $i < $maxPage; $i++)
		<a href="{{ url('/') }}/admin/user/page/{{ $i }}"><button class="sbutton">{{ $i }}</button></a>
	@endfor
</div>
<div class="categories">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Category</li>
	</ol>
	<div>
		<button class="btn btn-success btn-lg" value="category" id="add"><i class="fa fa-plus"></i> Add</button>
		<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-refresh"></i> Reload</button>
		<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i> Delete</button>
	</div>
	<table class="table table-striped" id="table" style="width:100%">
		<thead>
			<tr>
				<td><input type="checkbox" id="all"></td>
				<td><strong>ID</strong></td>
				<td><strong>Name</strong></td>
				<td><strong>Type</strong></td>
				<td><strong>Parent</strong></td>
				<td><strong>Tools</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td><input type="checkbox" value="{{ $category->id }}"></td>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->type }}</td>
					<td>{{ isset($category->parent) ? $category->parent->name : ''}}</td>
					<td>
						<button value="{{ $category->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i></button>
						<button value="{{ $category->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Banner</li>
	</ol>
	<div>
		<button class="btn btn-success btn-lg" value="banner" id="add"><i class="fa fa-plus"></i> Add</button>
		<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-sync-alt"></i> Reload</button>
		<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i> Delete</button>
	</div>
	<table class="table table-striped" id="table" style="width:100%">
		<thead>
			<tr>
				<td><input type="checkbox" id="all"></td>
				<td><strong>ID</strong></td>
				<td><strong>Image</strong></td>
				<td><strong>Url</strong></td>
				<td><strong>Status</strong></td>
				<td><strong>Tools</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($banners as $banner)
				<tr>
					<td><input type="checkbox" value="{{ $banner->id }}"></td>
					<td>{{ $banner->id }}</td>
					<td><img height="100px" src="{{ url('/') }}/public/{{ $banner->photo->url }}"></img></td>
					<td>{{ $banner->url }}</td>
					<td>{{ $banner->status }}</td>
					<td>
						<button value="{{ $banner->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i></button>
						<button value="{{ $banner->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
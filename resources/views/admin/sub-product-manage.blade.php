<div class="subProducts">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin/product">Product</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin/product/edit/{{ $product->id }}">{{ $product->name }}</a>
		</li>
		<li class="breadcrumb-item active">Subproduct</li>
	</ol>
	<div>
		<button class="btn btn-success btn-lg" value="subproduct" id="add"><i class="fa fa-plus"></i> Add</button>
		<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-refresh"></i> Reload</button>
		<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i> Delete</button>
	</div>
	<table class="table table-striped" id="table" style="width:100%">
		<thead>
			<tr>
				<td><input type="checkbox" id="all"></td>
				<td><strong>ID</strong></td>
				<td><strong>Memory</strong></td>
				<td><strong>Color</strong></td>
				<td><strong>Price</strong></td>
				<td><strong>Tools</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($subProducts as $subProduct)				
				<tr>
					<td><input type="checkbox" value="{{ $subProduct->id }}"></td>
					<td>{{ $subProduct->id }}</td>
					<td>{{ $subProduct->memory }}</td>
					<td>{{ $subProduct->color }}</td>
					<td>{{ $subProduct->price }}</td>
					<td>
						<button value="{{ $subProduct->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i></button>
						<button value="{{ $subProduct->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
					</td>
				</tr>				
			@endforeach
		</tbody>
	</table>
</div>
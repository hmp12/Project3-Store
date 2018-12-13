<div class="products">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Product</li>
	</ol>
	<div>
		<button class="btn btn-success btn-lg" value="product" id="add"><i class="fa fa-plus"></i> Add</button>
		<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-sync-alt"></i> Reload</button>
		<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i> Delete</button>
	</div>
	<table class="table table-striped" id="table" style="width:100%">
		<thead>
			<tr>
				<td><input type="checkbox" id="all"></td>
				<td><strong>ID</strong></td>
				<td><strong>Name</strong></td>
				<td><strong>Price</strong></td>
				<td><strong>Category</strong></td>
				<td><strong>Tools</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
				@php
					$category = $product->category->name;
					$price = number_format($product->price);
				@endphp
				<tr>
					<td><input type="checkbox" value="{{ $product->id }}"></td>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $price }}đ</td>
					<td>{{ $category }}</td>
					<td>
						<button value="{{ $product->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-edit"></i></button>
						<button value="{{ $product->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
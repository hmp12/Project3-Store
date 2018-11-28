<div class="products">
	<h1>Products</h1>
	<div>
		<button class="button" value="product" id="add"><i class="fa fa-plus"></i>Add</button>
		<button class="button" id="reload"><i class="fa fa-refresh"></i>Reload</button>
		<button class="button delete" id="delete"><i class="fa fa-trash"></i>Delete</button>
	</div>
	<table class="table">
		<tr>
			<td><input type="checkbox" id="all"></td>
			<td><strong>ID</strong></td>
			<td><strong>Name</strong></td>
			<td><strong>Price</strong></td>
			<td><strong>Categories</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		@foreach ($products as $product)
			@php
				$category = $product->category->label;
				$price = number_format($product->price);
			@endphp
			<tr>
				<td><input type="checkbox" value="{{ $product->id }}"></td>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $price }}đ</td>
				<td>{{ $category }}</td>
				<td>
					<button value="{{ $product->id }}" class="sbutton edit"><i class="fa fa-pencil-square-o"></i></button>
					<button value="{{ $product->id }}" class="sbutton delete"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		@endforeach
	</table>
</div>
<div class="page_number">
	@for ($i = 1; $i < $maxPage; $i++)
		<a href="{{ url('/') }}/admin/product/page/{{ $i }}"><button class="sbutton">{{ $i }}</button></a>
	@endfor
</div>
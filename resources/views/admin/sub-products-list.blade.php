<div class="subProducts">
	<h1>{{ $product->name }}</h1>
	<div>
		<button class="button" value="subproduct" id="add"><i class="fa fa-plus"></i>Add</button>
		<button class="button" id="reload"><i class="fa fa-refresh"></i>Reload</button>
		<button class="button delete" id="delete"><i class="fa fa-trash"></i>Delete</button>
	</div>
	<table class="table">
		<tr>
			<td><input type="checkbox" id="all"></td>
			<td><strong>ID</strong></td>
			<td><strong>Memory</strong></td>
			<td><strong>Color</strong></td>
			<td><strong>Price</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		@foreach ($subProducts as $subProduct)				
			<tr>
				<td><input type="checkbox" value="{{ $subProduct->id }}"></td>
				<td>{{ $subProduct->id }}</td>
				<td>{{ $subProduct->memory }}</td>
				<td>{{ $subProduct->color }}</td>
				<td>{{ $subProduct->price }}</td>
				<td>
					<button value="{{ $subProduct->id }}" class="sbutton edit"><i class="fa fa-pencil-square-o"></i></button>
					<button value="{{ $subProduct->id }}" class="sbutton delete"><i class="fa fa-trash"></i></button>
				</td>
			</tr>				
		@endforeach
	</table>
</div>
<div class="page_number">
	@for ($i = 1; $i < $maxPage; $i++)
		<a href="{{ url('/') }}/admin/edit/{{ $productId }}/subProduct/page/{{ $i }}"><button class="sbutton">{{ $i }}</button></a>
	@endfor
</div>
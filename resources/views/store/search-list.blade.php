<table>
	@foreach ($products as $product)
		@php
			$price = number_format($product->price);
			$spec = $product->spec;

			$photos = $product->photos;
			if (!empty($photos[0])) {
				$img_url = $photos[0]->url;
			}
			else {
				$img_url = '';
			}
		@endphp
		<tr onclick="window.location='store/product/{{ $product->id }}'">
			<th><img height="50px" src="{{ url('/') }}/public/{{ $img_url }}"></th>
			<th>{{ $product->name }}</th>
			<th><button value="{{ $product->id }}" class="btn btn-info btn-sm compare"><i class="fa fa-columns"></i></button></th>
		</tr>
	@endforeach
</table>

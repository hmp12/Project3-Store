
@if (empty($compareProducts[0]))
	<span>Không có sản phẩm để so sánh</span>
@else
	<table>
		@for ($i = 0; $i < 3; $i++)
			@php
				if (empty($compareProducts[$i])) {
					continue;
				}
				$product = $compareProducts[$i];
				
				$photos = $product->photos;
				$img_url = $photos[0]->url;
			@endphp
			<tr>
				<th><img height="50px" src="{{ url('/') }}/public/{{ $img_url }}"></th>
				<th>{{ $product->name }}</th>
				<th><button value="{{ $i }}" class="btn btn-danger btn-sm discard"><i class="fa fa-times"></i></button></th>
			</tr>
			
		@endfor
	
	</table>
	<a href="{{ url('/') }}/store/compare-page"><button class="btn btn-primary btn-lg">So sánh</button></a>
@endif

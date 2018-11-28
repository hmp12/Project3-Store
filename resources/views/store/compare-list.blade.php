
@if (empty($compareProducts[0]))
	<span class="price">Không có sản phẩm để so sánh</span>
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
				<th><img height="50px" src="{{ url('/') }}/file?url={{ $img_url }}"></th>
				<th>{{ $product->name }}</th>
				<th><button value="{{ $i }}" class="sbutton discard"><i class="fa fa-times"></i></button></th>
			</tr>
			
		@endfor
	
	</table>
	<a href="{{ url('/') }}/store/compare-product-table"><button class="button">So sánh</button></a>
@endif

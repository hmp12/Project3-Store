
@if (!empty($carts))
	<table>
	@foreach ($carts as $cart)
		@php
			$subProduct = $cart->subProduct;
			$product = $subProduct->product;
			
			$price = number_format($subProduct->price);

			$photos = $product->photos;
			$imgUrls = array();
			foreach ($photos as $photo) {
				$imgUrls[] = $photo->url;
			}
		@endphp
		<tr>
			<th><img height="50px" src="{{ url('/') }}/public/{{ isset($imgUrls[0]) ? $imgUrls[0] : '' }}"></th>
			<th>{{ $product->name.' '.$subProduct->memory }}</th>
			<th>x{{ $cart->quanlity }}</th>
			<th class="price">{{ $price }}đ</th>
			<th><button value="{{ $cart->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-times"></i></button></th>
		</tr>
	@endforeach
	</table>
	<a><button class="btn btn-primary btn-lg" id="btn-purchase">Purchase</button></a>
@else
	<span>Không có sản phẩm trong giỏ hàng</span>
@endif



@if (count($products) > 0)
	@foreach($products as $product)
		@php
			$spec = $product->spec;
			$price = number_format($product->price);

			$photos = $product->photos;
			$img_urls = array();
			foreach ($photos as $photo) {
				$img_urls[] = $photo->url;
			}
		@endphp
		<div class="item-box">
			<img src="{{ url('/') }}/public/{{ isset($img_urls[0]) ? $img_urls[0] : '' }}" class="image">
			<div class="info">
				<a href="store/product/{{ $product->id }}">
					<p>{{ $product['name'] }}</p>
					<h5 class="price">{{ $price }}đ</h5>
					<div class="specs">
						<table>
							<tr>
								<th>Màn hình</th>
								<th>{{ (isset($product['display'])) ? $product['display'] : ''}}</th>
							</tr>
							<tr>
								<th>OS</th>
								<th>{{ (isset($product['os'])) ? $product['os'] : ''}}</th>
							</tr>
							<tr>
								<th>CPU</th>
								<th>{{ (isset($product['cpu'])) ? $product['cpu'] : ''}}</th>
							</tr>
							<tr>
								<th>RAM</th>
								<th>{{ (isset($product['ram'])) ? $product['ram'] : ''}}</th>
							</tr>
						</table>
					</div>
				</a>
				<button value="{{ $product['id'] }}" class="btn btn-info btn-lg">So sánh</button>	
			</div>
		</div>
	@endforeach
@else
	<h1>No item match</h1>
@endif
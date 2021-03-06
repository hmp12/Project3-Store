
<div class="banner-news">
	<div class="banners">				
		@foreach ($banners as $banner) {
			@php
				$imgUrl = $banner->photo->url;
				$img = url('/').'/public/'.$imgUrl;
			@endphp
			<div class=banner>
				<a href="{{ $banner['url'] }}"><img src="{{ $img }}"></a>
			</div>
		@endforeach

		<div class=prev>
			<li class="fa fa-chevron-left">
		</div>
		<div class=next>
			<li class="fa fa-chevron-right">
		</div>
		<div class=dots>
			@for ($i=0;$i<(count($banners));$i++) 
				<span class=dot></span>
			@endfor
		</div>
	</div>
</div>

@include ('common.phone-filter')

<div class="products">

	@foreach ($categories as $cate)
		<div id="{{ $cate->name }}">
			<h1>{{ $cate->name }}</h1>
		</div>
		<div class="row">
			@php
				$products = $cate->products;
			@endphp
			@if (!empty($products))
				@foreach($products as $product)
					@php
						$price = number_format($product->price);

						$photos = $product->photos;
						$imgUrls = array();
						foreach ($photos as $photo) {
							$imgUrls[] = $photo->url;
						}

					@endphp
					<div class="item-box">
						<img src="{{ url('/') }}/public/{{ isset($imgUrls[0]) ? $imgUrls[0] : '' }}" class="image">
						<div class="info">
							<a href="{{ url('/') }}/store/product/{{ $product->id }}">
								<div>		
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
								</div>
							</a>
							<button value="{{ $product['id'] }}" class="btn btn-primary btn-lg btn-compare">So sánh</button>	
						</div>
					</div>				
			@endforeach
		@endif
		</div>
	@endforeach
</div>


<div class="banner-news">
	<div class="banners">				
		@foreach ($banners as $banner) {
			@php
				$imgUrl = $banner->photo->url;
				$img = './file?url='.$imgUrl;
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
	<div class="news">
		<div class="head">
			<h3>Tin tức</h3>
		</div>
		<table>
			@foreach ($posts as $post)
				<!-- $imgUrl = $post['img_url'];
				$img = '../php/getfile.php?url='.$imgUrl;
				echo '
					<tr class="new">
						<th><img src="'.$img.'"></th>
						<th><a href="../news/index.php?tab=post&v='.$post['id'].'"><h4>'.$post['title'].'</h4></a></th>
					</tr>
				'; -->
			@endforeach

		</table>
	</div>
</div>

@include ('common.phone_filter')

<div class="products">

	@foreach ($categories as $cate)
		<div class="container">
			<div id="{{ $cate['url'] }}">
				<h1>{{ $cate['label'] }}</h1>
			</div>
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
						<img src="{{ url('/') }}/file?url={{ isset($imgUrls[0]) ? $imgUrls[0] : '' }}" class="image">
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
							<button value="{{ $product['id'] }}" class="button compare">So sánh</button>	
						</div>
					</div>	
				
			@endforeach
		@endif
		</div>
	@endforeach
</div>

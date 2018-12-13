@php
	$id = $product->id;
	$name = $product->name;
	$price = number_format($product->price);

	$photos = $product->photos;
	$img_urls = array();

	if (count($photos) > 0) {
		foreach ($photos as $photo) {
			$img_urls[] = $photo->url;
		}
	}
	else {
		$img_urls[0] = 'img/default.png';
	}
@endphp
<script type="text/javascript">
	var productId = "{{ $id }}";
	var subProductId = "{{ $subProducts[0]->id }}";
	var memory = "{{ $subProducts[0]->memory }}";
	var color = "{{ $subProducts[0]->color }}";
</script>
<div class="product">
	<div class="modal add-cart">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Thêm vào giỏ hàng</h4>
					<span class="close fa fa-times"></span>
				</div>
				<div class="modal-body">
					<div class="row">
						<img src="{{ url('/') }}/public/{{ $img_urls[0] }}" height="100px" class="left image">
						<div class="col">
							<p>{{ $name }}</p>
						</div>
						<div class="col quanlity">
							<button class="btn btn-basic btn-sm" id="minus"><i class="fa fa-minus"></i></button>
							<input type="number" id="quanlity">
							<button class="btn btn-basic btn-sm" id="plus"><i class="fa fa-plus"></i></button>
						</div>
						<div class="col">
							<p class="price"><span id="cart-price">{{ $price }}</span>đ</p>
						</div>
					</div>					
				</div>
				<div class="modal-footer">
					<button class="btn btn-success btn-lg" id="btn-add-cart">Thêm</button>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="item-page">
		<div class="row">
			<div class="images col-6">
				<img src="{{ url('/') }}/public/{{ $img_urls[0] }}" width="80%" class="block image">
				@foreach ($img_urls as $img_url)
					<img src="{{ url('/') }}/public/{{ $img_url }}" width="15%" class="img">
				@endforeach
			</div>
			<div class="info col-5">
				<h1>{{ $name }}</h1>
				<h1 class="price" id="product-price">{{ $price }}đ</h1>
				<div class="sub-product">
					<p>Bộ nhớ: <span>
						@foreach ($memories as $memory)
							<button class="btn btn-basic btn-md memory-button" value="{{ $memory }}">{{ $memory }}</button>
						@endforeach
					</span></p>
					<p>Màu sắc: <span>
						@foreach ($colors as $color)
							<button class="{{ $color }} color-button" value="{{ $color }}">
								<label class="round-check"><label class="round-checked"></label></label>.
							</button>
						@endforeach
					</span></p>
				</div>
				<button class="cart-button" id="btn-cart"><h2><i class="fa fa-cart-arrow-down"></i> Giỏ hàng</h2></button>
				<button value="{{ $id }}" class="compare-button compare"><h2><i class="fa fa-columns"></i> So sánh</h2></button>
				<div class="spec">
					<div class="head">
					<h4>Thông số kỹ thuật</h4>
					</div>
					<table>
						<tr>
							<th>Màn hình</th>
							<th>{{ $product->display }}</th>
						</tr>
						<tr>
							<th>OS</th>
							<th>{{ $product->os }}</th>
						</tr>
						<tr>
							<th>Camera sau</th>
							<th>{{ $product->bcam }}</th>
						</tr>
						<tr>
							<th>Camera trước</th>
							<th>{{ $product->fcam }}</th>
						</tr>
						<tr>
							<th>CPU</th>
							<th>{{ $product->cpu }}</th>
						</tr>
						<tr>
							<th>RAM</th>
							<th>{{ $product->ram }}</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="head">
			<h1>Thông tin chi tiết</h1>
		</div>
		<div class="row">
			<div class="detail col-11">
				@php
					echo $product->detail;
				@endphp
			</div>
		</div>
	</div>
</div>



<div class="add products">
	<div class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close fa fa-times"></span>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button class="button" id="choose">Choose</button>
			</div>
		</div>
	</div>


	@if (!empty($id))
		<h1>Edit product</h1>
		<a href="./{{ $id }}/subproduct"><button class="button">SubProduct</button></a>
	@else
		<h1>Add product</h1>
	@endif
	<button class="button" value="product" id="back">Back</button>
	<form action="" enctype="multipart/form-data" method="post">
		@csrf
		<div class="container">
			<div class="left">
				<p>Name <span class="error">{{ (isset($nameError)) ? $nameError : '' }}</p>
				<input type="text" width="900px" name="name" value="{{ (isset($name)) ? $name : '' }}" placeholder="Type name in here" class="text">
				<p>Price <span class="error">{{ (isset($priceError)) ? $priceError : '' }}</p>
				<input type="number" name="price" value="{{ (isset($price)) ? $price : '' }}" placeholder="Insert price here" class="text" id="price">
				<p>Category <span class="error">{{ (isset($categoryError)) ? $categoryError : '' }}</p>
				<select name="categoryId" class="text">
					<option value="0" disabled hidden>Choose categories here</option>
					@foreach ($categories as $category)
						@if (empty($category->children))
							<option value="{{ $category->id }}" {{ (isset($categoryId) && $category->id == $categoryId) ? 'seleted' : ''}}>{{ $category->label }}</option>';
						@else
							<optgroup label="{{ $category->label }}">
							@foreach ($category->children as $child)
								<option value="{{ $child->id }}" {{ (isset($categoryId) && $child->id == $categoryId) ? 'seleted' : ''}}>{{ $child->label }}</option>';
							@endforeach	
						@endif
					@endforeach
				</select>
				<p>Tags</p>
				<input type="text" name="tags" placeholder="Input tags here" value="{{ (isset($tags)) ? $tags : '' }}" class="text" id="tags">
			</div>
			<div class="left">
				<p>Images</p>
				@if (count($photos) > 0)
					<img src="{{ url('/').'/'.$photos[0]->url }}" height="220px" class="block" id="pre_img">
					@foreach ($photos as $photo)
						<input type="text" name="imgIds[]" value="{{ $photo->id }}" class="hidden cover">
						<img src="{{ url('/').'/'.$photo->url }}" height="100px" class="pre_img">
					@endforeach
				@else
					<img src="{{ url('/').'/img/default.png' }}" height="220px" class="block" id="pre_img">	
				@endif
				<div>
					<input type="button" value="Choose" class="button" id="ch_img">
					<input type="button" value="Remove" class="button" id="remove">
				</div>
			</div>
		</div>

		<p>Detail <span class="error">{{ (isset($detailError)) ? $detailError : '' }}</p>
		<div class="textarea">
			<textarea name="detail">{{ (isset($detail)) ? $detail : '' }}</textarea>
		</div>
		<div class="spec">
			<h4>Specifications</h4>
			<table>
				<tr>
					<th><i class="fa fa-television"></i></th>
					<th><input type="text" name="display" value="{{ (isset($display)) ? $display : '' }}" placeholder="Display" class="text"></th>
					<th><i class="fa fa-android"></i></th>
					<th><input type="text" name="os" value="{{ (isset($os)) ? $os : '' }}" placeholder="OS" class="text"></th>
				</tr>
				<tr>
					<th><i class="fa fa-camera"></i></th>
					<th><input type="text" name="fcam" value="{{ (isset($fcam)) ? $fcam : '' }}" placeholder="Front Cam" class="text"></th>
					<th><i class="fa fa-camera-retro"></i></th>
					<th><input type="text" name="bcam" value="{{ (isset($bcam)) ? $bcam : '' }}" placeholder="Back Cam" class="text"></th>
				</tr>
				<tr>
					<th><i class="fa fa-tachometer"></th>
					<th><input type="text" name="cpu" value="{{ (isset($cpu)) ? $cpu : '' }}" placeholder="CPU" class="text"></th>
					<th><i class="fa fa-film"></th>
					<th><input type="text" name="gpu" value="{{ (isset($gpu)) ? $gpu : '' }}" placeholder="GPU" class="text"></th>
				</tr>
				<tr>
					<th><i class="fa fa-microchip"></th>
					<th><input type="text" name="ram" value="{{ (isset($ram)) ? $ram : '' }}" placeholder="RAM" class="text"></th>
					<th><i class="fa fa-hdd-o"></th>
					<th><input type="text" name="memory" value="{{ (isset($memory)) ? $memory : '' }}" placeholder="Memory" class="text"></th>
				</tr>
				<tr>
					<th><i class="fa fa-folder"></th>
					<th><input type="text" name="sd" value="{{ (isset($sd)) ? $sd : '' }}" placeholder="SD" class="text"></th>
					<th><i class="fa fa-address-card"></th>
					<th><input type="text" name="sim" value="{{ (isset($sim)) ? $sim : '' }}" placeholder="Sim" class="text"></th>
				</tr>
				<tr>
					<th><i class="fa fa-battery"></i></th>
					<th><input type="text" name="battery" value="{{ (isset($battery)) ? $battery : '' }}" placeholder="Battery" class="text"></th>
					<th><i class="fa fa-rss"></th>
					<th><input type="text" name="connect" value="{{ (isset($connect)) ? $connect : '' }}" placeholder="Connection" class="text"></th>
				</tr>
				<tr>
					<th><i class="fa fa-diamond"></i></th>
					<th><input type="text" name="color" value="{{ (isset($color)) ? $color : '' }}" placeholder="Color" class="text"></th>
					<th><i class="fa fa-truck"></th>
					<th><input type="text" name="weight" value="{{ (isset($weight)) ? $weight : '' }}" placeholder="Weight" class="text"></th>
				</tr>
			</table>
		</div>
		@if (!empty($id))
			<input type="submit" value="Update" class="button">
		@else
			<input type="submit" value="Add" class="button">
		@endif
	</form>
</div>
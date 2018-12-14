<div class="add products">
	<div class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close fa fa-times"></span>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-lg" id="choose">Choose</button>
			</div>
		</div>
	</div>

	<div class="edit-product">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url('/') }}/admin">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ url('/') }}/admin/product">Product</a>
			</li>
			
		@if (!empty($id))
			<li class="breadcrumb-item active">Edit</li>
		</ol>
			<a href="./{{ $id }}/subproduct"><button class="btn btn-primary btn-lg">SubProduct</button></a>
		@else
			<li class="breadcrumb-item active">Add</li>
		</ol>
		@endif
		<button class="btn btn-basic btn-lg" value="product" id="back">Back</button>
		<form action="" enctype="multipart/form-data" method="post">
			@csrf		
			<div class="row">
				<div class="col-5">
					<p>Name <span class="error">{{ (isset($nameError)) ? $nameError : '' }}</p>
					<input type="text" class="form-control" width="900px" name="name" value="{{ (isset($name)) ? $name : '' }}" placeholder="Type name in here" class="text">
					<p>Price <span class="error">{{ (isset($priceError)) ? $priceError : '' }}</p>
					<input type="number" class="form-control" name="price" value="{{ (isset($price)) ? $price : '' }}" placeholder="Insert price here" class="text" id="price">
					<p>Category <span class="error">{{ (isset($categoryError)) ? $categoryError : '' }}</p>
					<select name="categoryId" class="form-control" class="text">
						<option value="0" disabled hidden>Choose categories here</option>
						@foreach ($categories as $category)
							@if (empty($category->children))
								<option value="{{ $category->id }}" {{ (isset($categoryId) && $category->id == $categoryId) ? 'selected' : ''}}>{{ $category->name }}</option>
							@else
								<optgroup label="{{ $category->name }}">
								@foreach ($category->children as $child)
									<option value="{{ $child->id }}" {{ (isset($categoryId) && $child->id == $categoryId) ? 'selected' : ''}}>{{ $child->name }}</option>
								@endforeach	
							@endif
						@endforeach
					</select>
					<p>Tags</p>
					<input type="text" class="form-control" name="tags" placeholder="Input tags here" value="{{ (isset($tags)) ? $tags : '' }}" class="text" id="tags">
				</div>
				<div class="col-6">
					<p>Images</p>
					@if (isset($photos) && count($photos) > 0)
						<img src="{{ url('/').'/'.$photos[0]->url }}" height="220px" class="block" id="pre_img">
						@foreach ($photos as $photo)
							<input type="text" name="imgIds[]" value="{{ $photo->id }}" class="hidden cover">
							<img src="{{ url('/').'/'.$photo->url }}" height="100px" class="pre_img">
						@endforeach
					@else
						<img src="{{ url('/') }}/img/default.png" height="220px" class="block" id="pre_img">	
					@endif
					<div>
						<input type="button" value="Choose" class="btn btn-primary btn-lg float-left" id="ch_img">
						<input type="button" value="Remove" class="btn btn-danger btn-lg float-left" id="remove">
					</div>
				</div>
			</div>

			<p>Detail <span class="error">{{ (isset($detailError)) ? $detailError : '' }}</p>
			<div class="row">
				<div class="col textarea">
					<textarea class="form-control" name="detail">{{ (isset($detail)) ? $detail : '' }}</textarea>
				</div>
			</div>
			<h4>Specifications</h4>
			<div class="row">
				<table class="col-8">
					<tr>
						<th><i class="fa fa-television"></i></th>
						<th><input type="text" class="form-control" name="display" value="{{ (isset($display)) ? $display : '' }}" placeholder="Display" class="text"></th>
						<th><i class="fa fa-android"></i></th>
						<th><input type="text" class="form-control" name="os" value="{{ (isset($os)) ? $os : '' }}" placeholder="OS" class="text"></th>
					</tr>
					<tr>
						<th><i class="fa fa-camera"></i></th>
						<th><input type="text" class="form-control" name="fcam" value="{{ (isset($fcam)) ? $fcam : '' }}" placeholder="Front Cam" class="text"></th>
						<th><i class="fa fa-camera-retro"></i></th>
						<th><input type="text" class="form-control" name="bcam" value="{{ (isset($bcam)) ? $bcam : '' }}" placeholder="Back Cam" class="text"></th>
					</tr>
					<tr>
						<th><i class="fa fa-tachometer"></th>
						<th><input type="text" class="form-control" name="cpu" value="{{ (isset($cpu)) ? $cpu : '' }}" placeholder="CPU" class="text"></th>
						<th><i class="fa fa-film"></th>
						<th><input type="text" class="form-control" name="gpu" value="{{ (isset($gpu)) ? $gpu : '' }}" placeholder="GPU" class="text"></th>
					</tr>
					<tr>
						<th><i class="fa fa-microchip"></th>
						<th><input type="text" class="form-control" name="ram" value="{{ (isset($ram)) ? $ram : '' }}" placeholder="RAM" class="text"></th>
						<th><i class="fa fa-hdd-o"></th>
						<th><input type="text" class="form-control" name="memory" value="{{ (isset($memory)) ? $memory : '' }}" placeholder="Memory" class="text"></th>
					</tr>
					<tr>
						<th><i class="fa fa-folder"></th>
						<th><input type="text" class="form-control" name="sd" value="{{ (isset($sd)) ? $sd : '' }}" placeholder="SD" class="text"></th>
						<th><i class="fa fa-address-card"></th>
						<th><input type="text" class="form-control" name="sim" value="{{ (isset($sim)) ? $sim : '' }}" placeholder="Sim" class="text"></th>
					</tr>
					<tr>
						<th><i class="fa fa-battery"></i></th>
						<th><input type="text" class="form-control" name="battery" value="{{ (isset($battery)) ? $battery : '' }}" placeholder="Battery" class="text"></th>
						<th><i class="fa fa-rss"></th>
						<th><input type="text" class="form-control" name="connect" value="{{ (isset($connect)) ? $connect : '' }}" placeholder="Connection" class="text"></th>
					</tr>
					<tr>
						<th><i class="fa fa-diamond"></i></th>
						<th><input type="text" class="form-control" name="color" value="{{ (isset($color)) ? $color : '' }}" placeholder="Color" class="text"></th>
						<th><i class="fa fa-truck"></th>
						<th><input type="text" class="form-control" name="weight" value="{{ (isset($weight)) ? $weight : '' }}" placeholder="Weight" class="text"></th>
					</tr>
				</table>
			</div>
			@if (!empty($id))
				<input type="submit" value="Update" class="btn btn-success btn-lg">
			@else
				<input type="submit" value="Add" class="btn btn-success btn-lg">
			@endif
		</form>
	</div>
</div>
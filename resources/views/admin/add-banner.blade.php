<div class="add banners">
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

	<div class="edit-banner">
		@if (!empty($id))
			<h1>Edit banner</h1>
			@else
			<h1>Add banner</h1>
		@endif
		<button class="btn btn-basic btn-lg" value="banner" id="back">Back</button>
		<form action="" enctype="multipart/form-data" method="post">
			@csrf
		
			<div class="row">
				<div class="col-6">
					<p>Url <span class="error">{{ (isset($urlError)) ? $urlError : '' }}</p>
					<input type="text" class="form-control" width="900px" name="url" value="{{ (isset($url)) ? $url : '' }}" placeholder="Type url in here" class="text">
					
					<p>Images</p>
					@if (isset($photo))
						<img src="{{ url('/').'/'.$photo->url }}" height="220px" class="block" id="pre_img">
					@else
						<img src="{{ url('/').'/img/default.png' }}" height="220px" class="block" id="pre_img">	
					@endif
					<div>
						<input type="button" value="Choose" class="btn btn-primary btn-lg float-left" id="ch_img">
						<input type="button" value="Remove" class="btn btn-danger btn-lg float-left" id="remove">
					</div>
				</div>
			</div>
			@if (!empty($id))
				<input type="submit" value="Update" class="btn btn-success btn-lg">
			@else
				<input type="submit" value="Add" class="btn btn-success btn-lg">
			@endif
		</form>
	</div>
</div>
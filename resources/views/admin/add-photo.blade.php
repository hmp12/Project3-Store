<div>
	<h1>Add Photos</h1>
	<button class="btn btn-basic btn-lg" value="photo" id="back">Back</button>
	<p class="success">{{ isset($successFiles) ? 'There files upload successfully: '.$successFiles : ''}}</p>

	<div class="preview">
		<img src="{{ url('/') }}/img/default.png" height="200px" id="pre_img">
	</div>
	<form action="" enctype="multipart/form-data" method="post">
		@csrf
		<p>Upload photos <span class="error">{{ isset($errorFiles) ? 'There files upload failed: '.$errorFiles : ''}}</span></p>
		<input type="button" class="btn btn-primary btn-lg" value="Choose" onclick="$('#up_img').click()" class="file_input button">
		<input type="file" accept="image/*" name="img[]" multiple="true" class="hidden inline" id="up_img">
		<input type="submit" class="btn btn-success btn-lg" value="Upload" class="inline button">
	</form> 
</div>
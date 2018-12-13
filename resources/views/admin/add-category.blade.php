<div class="add categories">
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

	<div class="edit-category">
		@if (!empty($id))
			<h1>Edit category</h1>
			@else
			<h1>Add category</h1>
		@endif
		<button class="btn btn-basic btn-lg" value="category" id="back">Back</button>
		<form action="" enctype="multipart/form-data" method="post">
			@csrf
		
			<div class="row">
				<div class="col-6">
					<p>Name <span class="error">{{ (isset($nameError)) ? $nameError : '' }}</p>
					<input type="text" class="form-control" width="900px" name="name" value="{{ (isset($name)) ? $name : '' }}" placeholder="Type name in here" class="text">
					
					<p>Parent <span class="error">{{ (isset($parentError)) ? $parentError : '' }}</p>
					<select name="parentId" class="form-control" class="text">
						<option value="0">None</option>
						@foreach ($categories as $category)
							@if (empty($category->children))
								<option value="{{ $category->id }}" {{ (isset($parentId) && $category->id == $parentId) ? 'selected' : ''}}>{{ $category->name }}</option>
							@else
								<option value="{{ $category->id }}" {{ (isset($parentId) && $category->id == $parentId) ? 'selected' : ''}}>{{ $category->name }}</option>
							@endif
						@endforeach
					</select>
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
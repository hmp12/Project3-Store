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

	<div class="edit-sub-product">
		@if (!empty($id))
			<h1>Edit subProduct</h1>
		@else
			<h1>Add subProduct</h1>
		@endif
		<button class="btn btn-basic btn-lg" value="product" id="back">Back</button>
		<form action="" enctype="multipart/form-data" method="post">
			@csrf
		
			<div class="row">
				<div class="col-5">
					<p>Memory <span class="error">{{ (isset($memoryError)) ? $memoryError : '' }}</p>
					<input type="text" class="form-control" width="900px" name="memory" value="{{ (isset($memory)) ? $memory : '' }}" placeholder="Type memory in here" class="text">
					<p>Color <span class="error">{{ (isset($colorError)) ? $colorError : '' }}</p>
					<input type="text" class="form-control" width="900px" name="color" value="{{ (isset($color)) ? $color : '' }}" placeholder="Type color in here" class="text">
					<p>Price <span class="error">{{ (isset($priceError)) ? $priceError : '' }}</p>
					<input type="number" class="form-control" name="price" value="{{ (isset($price)) ? $price : '' }}" placeholder="Insert price here" class="text" id="price">
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
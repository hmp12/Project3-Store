<div class="photos">
	<h1>Photos</h1>
		<div>
			<button class="button" value="photo" id="add"><i class="fa fa-plus"></i>Add</button>
			<button class="button" id="reload"><i class="fa fa-refresh"></i>Reload</button>
			<button class="button delete" id="delete"><i class="fa fa-trash"></i>Delete</button>
		</div>

		<div class="inline round-checkbox">
			<input type="checkbox" id="all">
			<label for="all" class="round-check"></label>
		</div>
		<p class="inline">Check all<br/></p>


		@foreach ($photos as $photo)
				<div class="img_box">
					<input type="checkbox" value="{{ $photo->id }}">
					<label class="round-check"></label>
					<img src="{{ url('/') }}/file?url={{ $photo->url }}" class="image">
				</div>
		@endforeach
</div>
<div class="page_number">
	@for ($i = 1; $i < $maxPage; $i++)
		<a href="{{ url('/') }}/admin/photo/page/{{ $i }}"><button class="sbutton">{{ $i }}</button></a>
	@endfor
</div>
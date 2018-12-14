<div class="photos">
	<div class="inline round-checkbox">
		<input type="checkbox" id="all">
		<label for="all" class="round-check"></label>
	</div>
	<p class="inline">Check all<br/></p>


	@foreach ($photos as $photo)
			<div class="img_box">
				<input type="checkbox" value="{{ $photo->id }}">
				<label class="round-check"></label>
				<img src="{{ url('/') }}/public/{{ $photo->url }}" class="image">
			</div>
	@endforeach
</div>
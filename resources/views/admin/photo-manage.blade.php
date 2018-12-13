<div class="photos">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Photo</li>
	</ol>
		<div>
			<button class="btn btn-success btn-lg" value="photo" id="add"><i class="fa fa-plus"></i> Add</button>
			<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-refresh"></i> Reload</button>
			<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i> Delete</button>
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
					<img src="{{ url('/') }}/public/{{ $photo->url }}" class="image">
				</div>
		@endforeach
</div>
<ul class="pagination justify-content-center">
	@for ($i = 1; $i < $maxPage; $i++)
		<li class="page-item {{ $i == $page ? 'active' : '' }}">
			<a href="{{ url('/') }}/admin/photo/page/{{ $i }}" class="page-link">{{ $i }}</a>
		</li>
	@endfor
</ul>
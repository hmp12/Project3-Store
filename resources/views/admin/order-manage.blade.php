<div class="orders">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Order</li>
	</ol>
	<div>
		<button class="btn btn-success btn-lg" value="order" id="add"><i class="fa fa-plus"></i> Add</button>
		<button class="btn btn-primary btn-lg" id="reload"><i class="fa fa-sync-alt"></i> Reload</button>
		<button class="btn btn-danger btn-lg" id="delete"><i class="fa fa-trash"></i> Delete</button>
	</div>
	<table class="table table-striped" id="table" style="width:100%">
		<thead>
			<tr>
				<td><input type="checkbox" id="all"></td>
				<td><strong>ID</strong></td>
				<td><strong>Username</strong></td>
				<td><strong>Fullname</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Status</strong></td>
				<td><strong>Tools</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)				
				<tr>
					<td><input type="checkbox" value="{{ $order->id }}"></td>
					<td>{{ $order->id }}</td>
					<td>{{ $order->user->username }}</td>
					<td>{{ $order->user->name }}</td>
					<td>{{ $order->total }}</td>
					<td>{{ $order->status == 0 ? 'waiting' : 'delivered' }}</td>
					<td>
						<button value="{{ $order->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-eye"></i></button>
						<button value="{{ $order->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
					</td>
				</tr>				
			@endforeach
		</tbody>
	</table>
</div>
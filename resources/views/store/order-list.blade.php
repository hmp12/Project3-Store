<div class="orders">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">Order</li>
	</ol>
	<table class="table table-striped" id="table" style="width:100%">
		<thead>
			<tr>
				<td><input type="checkbox" id="all"></td>
				<td><strong>ID</strong></td>
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
					<td>{{ $order->total }}</td>
					<td>{{ $order->status == 0 ? 'waiting' : 'delivered' }}</td>
					<td>
					<a href="{{ url('/') }}/store/order/{{ $order->id }}">

						<button value="" class="btn btn-primary btn-sm">
								<i class="fa fa-eye"></i>
						</button>
						</a>

					</td>
				</tr>				
			@endforeach
		</tbody>
	</table>
</div>
<div class="orderDetail-detail">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin">Dashboard</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}/admin/order">Order</a>
		</li>
		<li class="breadcrumb-item active">Detail</li>
	</ol>
	<div>
		<h4>Order ID: {{ $orderDetails[0]->order->id }}</h4>
		<div class="row">
			<div class="col-3">
				<p>User: {{ $orderDetails[0]->order->user->username }}</p>
				<p>Name: {{ $orderDetails[0]->order->user->name }}</p>
				<p>Email: {{ $orderDetails[0]->order->user->email }}</p>
			</div>
			<div class="col-3">
				<p>Shipping Address: {{ $orderDetails[0]->order->address }}</p>
				<p>Bill Address: {{ $orderDetails[0]->order->user->address }}</p>
				<p>Phone: {{ $orderDetails[0]->order->user->phone }}</p>
			</div>
			<div class="col-5">
				<form action="" enctype="multipart/form-data" method="post">
					@csrf
					<div class="form-group row">
						<label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
						<div class="col-md-6">
							<select name="status" class="form-control" class="text">
								<option value="0" {{ $status == 0 ? 'selected' : ''}}>Waiting</option>
								<option value="1" {{ $status == 1 ? 'selected' : ''}}>Delivered</option>
							</select>	
							<input type="submit" value="Update" class="btn btn-success btn-lg">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <h4>List Product: </h4>
	<table class="table">
		<tr>
			<td><input type="checkbox" id="all"></td>
			<td><strong>ID</strong></td>
            <td><strong>Product</strong></td>
			<td><strong>Price</strong></td>
			<td><strong>Quanlity</strong></td>
			<td><strong>Total</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		@foreach ($orderDetails as $orderDetail)				
			<tr>
				<td><input type="checkbox" value="{{ $orderDetail->id }}"></td>
				<td>{{ $orderDetail->id }}</td>
				<td>{{ $orderDetail->subProduct->product->name }}</td>
                <td>{{ number_format($orderDetail->subProduct->price) }}</td>
				<td>{{ $orderDetail->quanlity }}</td>                
				<td>{{ number_format($orderDetail->subProduct->price*$orderDetail->quanlity) }}</td>
				<td>
					<button value="{{ $orderDetail->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
				</td>
			</tr>				
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>                
            <td><strong>{{ number_format($orderDetail->order->total) }}</strong></td>
            <td></td>
        </tr>
	</table>
</div>
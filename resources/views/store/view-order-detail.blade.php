<div class="orderDetail-detail">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active">Order Detail</li>
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
				<p>Status: {{ $orderDetails[0]->order->status == 0 ? 'Waiting' : 'Delivered' }}</p>
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
		</tr>
		@foreach ($orderDetails as $orderDetail)				
			<tr>
				<td><input type="checkbox" value="{{ $orderDetail->id }}"></td>
				<td>{{ $orderDetail->id }}</td>
				<td>{{ $orderDetail->subProduct->product->name }}</td>
                <td>{{ number_format($orderDetail->subProduct->price) }}</td>
				<td>{{ $orderDetail->quanlity }}</td>                
				<td>{{ number_format($orderDetail->subProduct->price*$orderDetail->quanlity) }}</td>
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
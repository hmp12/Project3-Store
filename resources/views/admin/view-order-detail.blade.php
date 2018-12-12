<div class="orderDetail-detail">
	<h1>Order Detail</h1>
	<div>
        <h4>Order ID: {{ $orderDetails[0]->order->id }}</h4>
        <h5>User: {{ $orderDetails[0]->order->user->username }}</h5>
        <h5>Name: {{ $orderDetails[0]->order->user->fullname }}</h5>
        <h5>Address: {{ $orderDetails[0]->order->address }}</h5>
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
					<button value="{{ $orderDetail->id }}" class="btn btn-primary btn-sm edit"><i class="fa fa-eye"></i></button>
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
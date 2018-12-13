<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use App\Models\OrderDetail;

    use View;

    class OrderController extends Controller {
        public function showOrders(Request $request) {
            $data['tab'] = 'order-manage';
            $data['orders'] = Order::all();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function viewOrderDetail(Request $request) {
            $data['tab'] = 'view-order-detail';
            $orderId = $request->id;

            $orderDetails = OrderDetail::where("order_id", $orderId)->get();
            $data['orderDetails'] = $orderDetails;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deleteOrders(Request $request) {
            $ids = $request->ids;

            Order::destroy($ids);
        }
    }

?>
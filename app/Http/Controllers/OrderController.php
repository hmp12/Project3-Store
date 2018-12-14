<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Order;

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

            $order = Order::find($orderId);
            $data['orderDetails'] = $order->orderDetails;

            if ($request->isMethod('post')) {
                if (!empty($request->status)) {
                    $order->status = $request->status;
                    $order->save();
                }
            }

            $data['status'] = $order->status;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deleteOrders(Request $request) {
            $ids = $request->ids;

            Order::destroy($ids);
        }
    }

?>
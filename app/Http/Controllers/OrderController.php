<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Order;

    use Auth;
    use View;

    class OrderController extends Controller {
        public function showOrders(Request $request) {
            $data['tab'] = 'order-manage';
            $data['orders'] = Order::all();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function showOrdersByUser(Request $request) {
            if (Auth::check()) {
                $userId = Auth::id();
            }
            else {
                return redirect('/login');
            }

            $data['tab'] = 'order-list';
            $data['orders'] = Order::where('user_id', $userId)->get();

            $view = View::make('store/index', $data);
            return $view;
        }

        public function viewOrderDetail(Request $request) {
            $data['tab'] = 'view-order-detail';
            $orderId = $request->id;

            $order = Order::find($orderId);
            if (Auth::id() != $order->user_id) {
                return redirect('/store/order');
            }
            $data['orderDetails'] = $order->orderDetails;

            if ($request->isMethod('post')) {
                if (!empty($request->status)) {
                    $order->status = $request->status;
                    $order->save();
                }
            }

            $data['status'] = $order->status;

            $view = View::make('store/index', $data);
            return $view;
        }

        public function updateOrderDetail(Request $request) {
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
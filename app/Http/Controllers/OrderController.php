<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use App\Models\OrderDetail;

    use View;

    class OrderController extends Controller {
        public function showOrders(Request $request) {
            $data['tab'] = 'orders-list';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $orders = Order::all();

            $orderDetailPerPage = 10;
            $data['maxPage'] = count($orders)/$orderDetailPerPage + 1;

            $data['orders'] = array();
            for ($i = ($page-1)*$orderDetailPerPage; $i < $page*$orderDetailPerPage; $i++) {
                if (empty($orders[$i])) {
                    break;
                }
                $data['orders'][] = $orders[$i];
            }
            $data['page'] = $page;

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
    }

?>
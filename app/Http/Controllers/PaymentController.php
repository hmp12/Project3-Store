<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\OrderDetail;
    use App\Models\Order;
    use App\Models\Cart;
    use App\Models\User;


    use View;

    class PaymentController extends Controller {
        public function purchase(Request $request) {
            if ($request->isMethod('post')) {
                if ($this->checkData($request)) {
                    $userId = $request->session()->get('user')->id;
                    $user = User::find($userId);
                    $carts = $user->carts;

                    $order = new Order();
                    $order->user_id = $userId;
                    $order->address = $request->address;
                    $order->total = 0;
                    $order->save();

                    foreach ($carts as $cart) {
                        $order->total += $cart->subProduct->price*$cart->quanlity;
                        
                        $orderDetail = new OrderDetail();
                        $orderDetail->subproduct_id = $cart->subproduct_id;
                        $orderDetail->quanlity = $cart->quanlity;
                        $orderDetail->order_id = $order->id;
                        $orderDetail->save();

                        $cart->delete();
                    }
                    $order->save();

                    return "1";
                }
            }
            $view = View::make('store/purchase');
            return $view;
        }

        public function checkData(Request $request) {
            return true;
        }
    }
?>
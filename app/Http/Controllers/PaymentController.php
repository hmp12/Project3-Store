<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use App\Models\Cart;

    use View;

    class PaymentController extends Controller {
        public function purchase(Requets $request) {
            $data = array();
            $view = View::make('store/purchase', $data);
            return $view;
        }
    }
?>
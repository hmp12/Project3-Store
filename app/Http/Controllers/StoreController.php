<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Banner;
    use App\Models\Post;
    use App\Models\Cart;
    use App\Models\User;
    
    use Auth;
    use View;

    class StoreController extends Controller {

        public function showHomePage() {
            $data['tab'] = 'homepage';
            $data['categories'] = Category::where('parent_id', '2')->get();
            $data['banners'] = Banner::where('status', '1')->get();
            $data['posts'] = Post::all();

            $view = View::make('store/index', $data);
            return $view;
        }
        
        public function showCart(Request $request) {
            $product = array();
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::find($userId);
                $carts = $user->carts;
            }
            else {
                $carts = null;
            }

            $view = View::make('store/cart', ['carts' => $carts]);
            return $view;
        }

        public function addCart(Request $request) {
            if (Auth::check()) {
                $cart = new Cart();
                $cart->user_id = Auth::id();
                // $cart->product_id = $request->productId;
                $cart->subProduct_id = $request->subProductId;
                $cart->quanlity = $request->quanlity;
                $cart->save();
            }
        }

        public function deleteCart(Request $request) {
            $id = $request->id;
            Cart::destroy($id);
        }

        public function showCompareProducts(Request $request) {
            $compareProducts = $request->session()->get('compareProducts');

            $view = View::make('store/compare-list', ['compareProducts' => $compareProducts]);
            return $view;
        }

        public function addCompareProduct(Request $request) {
            $id = $request->id;

            if ($request->session()->has('compareProducts')) {
                $compareProducts = $request->session()->get('compareProducts');
            }
            else {
                $compareProducts = array();
            }

            if (empty($compareProducts[0])) {
                $compareProducts[0] = Product::where('id', $id)->first();
            }
            else if ($id != $compareProducts[0] && empty($compareProducts[1])) {
                $compareProducts[1] = Product::where('id', $id)->first();
            }
            else if ($id != $compareProducts[0] && $id != $compareProducts[1] && empty($compareProducts[2])) {
                $compareProducts[2] = Product::where('id', $id)->first();
            }

            $request->session()->put('compareProducts', $compareProducts);
        }

        public function deleteCompareProduct(Request $request) {
            $id = $request->id;

            if ($request->session()->has('compareProducts')) {
                $compareProducts = $request->session()->get('compareProducts');
            }
            else {
                return;
            }

            if (!empty($compareProducts[$id])) {
                $compareProducts[$id] = null;
            }
        
            $request->session()->put('compareProducts', $compareProducts);
        }

    }

?>
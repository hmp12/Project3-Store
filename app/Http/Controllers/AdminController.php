<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Photo;
    use App\Models\Banner;
    use App\Models\Order;
    use App\Models\User;


    use View;

    class AdminController extends Controller {

        public function showDashboard() {
            $tab = 'dashboard';
            $usersCount = User::count();
            $ordersCount = Order::count();
            $productsCount = Product::count();
            $photosCount = Photo::count();
            $bannersCount = Banner::count();
            $categoriesCount = Category::count();

            $data = get_defined_vars();
            $view = View::make('admin/index', $data);
            return $view;
        }

        
    }
?>
<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Photo;
    use App\Models\User;

    use View;

    class TestController extends Controller {
        public function index(Request $request) {
            $data = array();
            $view = View::make("common.test", $data);
            return $view;
        }
    }
<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;

    use View;

    class FileController extends Controller {
        public function getData(Request $request) {
            $url = $request->url;
            $view = View::make('common/get-file-data', ['url' => $url]);
            return $view;
        }

    }

?>
<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use App\Models\SubProduct;
    use View;

    class SubProductController extends Controller {
        public function showSubProducts(Request $request) {
            $productId = $request->id;
            $data['productId'] = $productId;

            $data['tab'] = 'sub-products-list';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $data['product'] = Product::where('id', $productId)->first();
            $subProducts = $data['product']->subProducts;

            $productsPerPage = 10;
            $data['maxPage'] = count($subProducts)/$productsPerPage + 1;

            $data['subProducts'] = array();
            for ($i = ($page-1)*$productsPerPage; $i < $page*$productsPerPage; $i++) {
                if (empty($subProducts[$i])) {
                    break;
                }
                $data['subProducts'][] = $subProducts[$i];
            }
            $data['page'] = $page;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function getSubProduct(Request $request) {
            $productId = $request->productId;
            $memory = $request->memory;
            $color = $request->color;

            $product = Product::find($productId);
            $subProduct = SubProduct::where('product_id', $productId)
                                        ->where('memory', $memory)
                                        ->where('color', 'like', $color)
                                        ->first();
            return $subProduct;
        }
    }
?>
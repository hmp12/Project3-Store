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

            $data['tab'] = 'sub-product-manage';
            $data['product'] = Product::where('id', $productId)->first();
            $data['subProducts'] = $data['product']->subProducts;            

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function addSubProduct(Request $request) {
            $tab = 'add-sub-product';
            $productId = $request->id;

            if ($request->isMethod('post')) {
                $memory = $request->memory;
                $color = $request->color;
                $price = $request->price;
                
                $subProduct = new SubProduct();
                $valid = True;
                if (!empty($memory)) {
                    $subProduct->memory = $memory;
                }
                else {
                    $valid = False;
                    $memoryError = "memory is empty";
                }

                if (!empty($color)) {
                    $subProduct->color = $color;
                }
                else {
                    $valid = False;
                    $colorError = "color is empty";
                }

                if (!empty($price)) {  
                    $subProduct->price = $price;
                }
                else {
                    $valid = False;
                    $priceError = "price is empty";
                }
                
                
                if ($valid) {
                    $subProduct->memory = $memory;
                    $subProduct->color = $color;
                    $subProduct->price = $price;                    
                    $subProduct->product_id = $productId;

                    $subProduct->save();           
                }
            }

            $product = Product::where('id', $productId)->first();
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;

        }

        public function updateSubProduct(Request $request) {
            $tab = 'add-sub-product';
            $id = $request->id;
            $subProduct = SubProduct::where('id', $id)->first();
            if (!empty($subProduct)) {
                $memory = $subProduct->memory;
                $color = $subProduct->color;
                $price = $subProduct->price;
                
            }
            else {
                return "SubProduct is not exist";
            }
            
            if ($request->isMethod('post')) {
                $memory = $request->memory;
                $color = $request->color;
                $price = $request->price;
                
                $valid = True;
                if (!empty($memory)) {
                    $subProduct->memory = $memory;
                }
                else {
                    $valid = False;
                    $memoryError = "memory is empty";
                }

                if (!empty($color)) {
                    $subProduct->color = $color;
                }
                else {
                    $valid = False;
                    $colorError = "color is empty";
                }

                if (!empty($price)) {  
                    $subProduct->price = $price;
                }
                else {
                    $valid = False;
                    $priceError = "price is empty";
                }
                
                
                if ($valid) {
                    $subProduct->memory = $memory;
                    $subProduct->color = $color;
                    $subProduct->price = $price;                    

                    $subProduct->save();    
                }
            }

            $product = $subProduct->product;
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deleteSubProducts(Request $request) {
            $ids = $request->ids;

            SubProduct::destroy($ids);
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
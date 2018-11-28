<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Photo;
    use View;

    class ProductController extends Controller {
        public function showProducts(Request $request) {
            $data['tab'] = 'products-list';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $products = Product::all();

            $productsPerPage = 10;
            $data['maxPage'] = count($products)/$productsPerPage + 1;

            $data['products'] = array();
            for ($i = ($page-1)*$productsPerPage; $i < $page*$productsPerPage; $i++) {
                if (empty($products[$i])) {
                    break;
                }
                $data['products'][] = $products[$i];
            }
            $data['page'] = $page;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function addProduct(Request $request) {
            $tab = 'add-product';
            if ($request->isMethod('post')) {
                $name = $request->name;
                $price = $request->price;
                $categoryId = $request->categoryId;
                $tags = $request->tags;
                $detail = $request->detail;
                $display = $request->display;
                $os = $request->os;
                $fcam = $request->fcam;
                $bcam = $request->bcam;
                $cpu = $request->cpu;
                $gpu = $request->gpu;
                $ram = $request->ram;
                $memory = $request->memory;
                $sd = $request->sd;
                $sim = $request->sim;
                $battery = $request->battery;
                $connect = $request->connect;
                $material = $request->material;
                $weight = $request->weight;
                $imgIds = $request->imgIds;

                $valid = True;
                if (!empty($name)) {
                    $product->name = $name;
                }
                else {
                    $valid = False;
                    $nameError = "name is empty";
                }

                if (!empty($price)) {
                    $product->price = $price;
                }
                else {
                    $valid = False;
                    $priceError = "price is empty";
                }

                if (!empty($tags)) {
                    $product->tags = $tags;
                }
                else {
                    $product->tags = '';
                }

                if (!empty($categoryId)) {
                    $product->category_id = $categoryId;
                }
                else {
                    $valid = false;
                    $categoryError = "category is emty";
                }

                if (!empty($detail)) {
                    $product->detail = $detail;
                }
                else {
                    $valid = false;
                    $detailError = "detail is empty";
                }

                if (!empty($imgIds)) {  
                    $photos = array();
                    foreach ($imgIds as $imgId) {
                        $photos[] = Photo::where('id', $imgId)->first();       
                    }
                }
                
                if ($valid) {
                    $product = new Product();
                    $product->display = $display;
                    $product->os = $os;
                    $product->fcam = $fcam;
                    $product->bcam = $bcam;
                    $product->cpu = $cpu;
                    $product->gpu = $gpu;
                    $product->ram = $ram;
                    $product->memory = $memory;
                    $product->sd = $sd;
                    $product->sim = $sim;
                    $product->battery = $battery;
                    $product->connect = $connect;
                    $product->material = $material;
                    $product->weight = $weight;
                    $product->save();
                    
                    foreach ($photos as $photo) {
                        $product->photos()->save($photo);
                    }
                }
            }

            $categories = Category::where('parent_id', 2)->get();
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }


        public function editProduct(Request $request) {
            $tab = 'add-product';
            $id = $request->id;
            $product = Product::where('id', $id)->first();
            if (!empty($product)) {
                $name = $product->name;
                $price = $product->price;
                $categoryId = $product->category_id;
                $photos = $product->photos;
                $tags = $product->tags;
                $detail = $product->detail;
                $display = $product->display;
                $os = $product->os;
                $fcam = $product->fcam;
                $bcam = $product->bcam;
                $cpu = $product->cpu;
                $gpu = $product->gpu;
                $ram = $product->ram;
                $memory = $product->memory;
                $sd = $product->sd;
                $sim = $product->sim;
                $battery = $product->battery;
                $connect = $product->connect;
                $material = $product->material;
                $weight = $product->weight;

            }
            else {
                return "Product is not exist";
            }
            
            if ($request->isMethod('post')) {
                $name = $request->name;
                $price = $request->price;
                $categoryId = $request->categoryId;
                $tags = $request->tags;
                $detail = $request->detail;
                $display = $request->display;
                $os = $request->os;
                $fcam = $request->fcam;
                $bcam = $request->bcam;
                $cpu = $request->cpu;
                $gpu = $request->gpu;
                $ram = $request->ram;
                $memory = $request->memory;
                $sd = $request->sd;
                $sim = $request->sim;
                $battery = $request->battery;
                $connect = $request->connect;
                $material = $request->material;
                $weight = $request->weight;
                $imgIds = $request->imgIds;

                $valid = True;
                if (!empty($name)) {
                    $product->name = $name;
                }
                else {
                    $valid = False;
                    $nameError = "name is empty";
                }

                if (!empty($price)) {
                    $product->price = $price;
                }
                else {
                    $valid = False;
                    $priceError = "price is empty";
                }

                if (!empty($tags)) {
                    $product->tags = $tags;
                }
                else {
                    $product->tags = '';
                }

                if (!empty($categoryId)) {
                    $product->category_id = $categoryId;
                }
                else {
                    $valid = false;
                    $categoryError = "category is emty";
                }

                if (!empty($detail)) {
                    $product->detail = $detail;
                }
                else {
                    $valid = False;
                    $detailError = "detail is empty";
                }

                if (!empty($imgIds)) {  
                    $photos = array();
                    foreach ($imgIds as $imgId) {
                        $photos[] = Photo::where('id', $imgId)->first();       
                    }
                }
                
                if ($valid) {
                    $product->display = $display;
                    $product->os = $os;
                    $product->fcam = $fcam;
                    $product->bcam = $bcam;
                    $product->cpu = $cpu;
                    $product->gpu = $gpu;
                    $product->ram = $ram;
                    $product->memory = $memory;
                    $product->sd = $sd;
                    $product->sim = $sim;
                    $product->battery = $battery;
                    $product->connect = $connect;
                    $product->material = $material;
                    $product->weight = $weight;

                    $product->save();
                    foreach ($photos as $photo) {
                        $product->photos()->save($photo);
                    }
                }
            }

            $categories = Category::where('parent_id', 2)->get();
            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }
        
        public function deleteProducts(Request $request) {
            $ids = $request->ids;

            Product::destroy($ids);
        }


        public function getProductFilter(Request $request) {
            if (!empty($request->type)) {
                $type = $request->type;
            }
            else {
                $type = '';
            }
            if (!empty($request->branch)) {
                $branch = $request->branch;
            }
            else {
                $branch = '';
            }
            if (!empty($request->price)) {
                $price = $request->price;
                if ($price > 3) {
                    $lprice = 3*5000000;
                    $rprice = 100*5000000;
                }
                else {
                    $lprice = ($price-1)*5000000;
                    $rprice = $price*5000000;
                }
            }
            else {
                $lprice = 0;
                $rprice = 100*5000000;
            }
            if (!empty($request->os)) {
                $os = $request->os;
            }
            if (!empty($request->display)) {
                $display = $request->display;
            }
            if (!empty($request->ram)) {
                $ram = $request->ram;
                if ($ram > 3) {
                    $lram = 3*2;
                    $rram = 100*2;
                }
                else {
                    $lram = ($ram-1)*2;
                    $rram = $ram*2;
                }
            }
            else {
                $lram = 0;
                $rram = 9;
            }
            if (!empty($request->cam)) {
                $cam = $request->cam;
                if ($cam > 3) {
                    $lcam = 3*5;
                    $rcam = 99;
                }
                else {
                    $lcam = ($cam-1)*5;
                    $rcam = $cam*5;
                }
            }
            else {
                $lcam = 0;
                $rcam = 99;
            }
            if ($lcam < 10) {
                $lcam = '0'.$lcam;
            }
            if (!empty($request->sort)) {
                $sort = $request->sort;
            }
            else {
                $sort = 'null';
            }

            $products = Product::where('category_id', 'like', $type.'%')
                                ->where('tags', 'like', '%'.$branch.'%')
                                ->where('price', '<=', $rprice)
                                ->where('price', '>', $lprice)
                                ->where('os', 'like', '%'.$os.'%')
                                ->where('display', 'like', '%'.$display.'%')
                                ->where('ram', '<=', $rram)
                                ->where('ram', '>', $lram)
                                ->where('bcam', '<=', $rcam)
                                ->where('bcam', '>', $lcam)
                                ->get();

            $data = get_defined_vars();

            $view = View::make('store/phone-filter', ['products' => $products]);
            return $view;
        }

        public function search(Request $request) {
            $input = $request->input;
            $words = explode(' ', $input);

            if (!empty($words)) {
                $productMatchPoints = array();
                foreach ($words as $word) {
                    if (empty($word)) {
                        continue;
                    }

                    $products = Product::where('tags', 'like', $word.',%')->orWhere('tags', 'like', '%,'.$word.',%')->get();
                    if (!empty($products)) {
                        foreach ($products as $product) {
                            if (!isset($productMatchPoints[$product['id']])) {
                                $productMatchPoints[$product['id']] = 0;
                            }
                            $productMatchPoints[$product['id']]++;
                        }
                    }	
                }
                if (!empty($word)) {
                    $products = Product::where('tags', 'like', $word.'%')->orWhere('tags', 'like', '%,'.$word.'%')->get();
                    if (!empty($products)) {
                        foreach ($products as $product) {
                            if (!isset($productMatchPoints[$product['id']])) {
                                $productMatchPoints[$product['id']] = 0;
                            }
                            $productMatchPoints[$product['id']]++;
                        }
                    }
                }
            }

            if (!empty($productMatchPoints)) {
                arsort($productMatchPoints);
                $products = array();
                foreach ($productMatchPoints as $productId => $point) {
                    $products[] = Product::where('id', $productId)->first();
                }
            }
            $view = View::make('store/search-list', ['products' => $products]);
            return $view;
        }

        public function showProductDetail(Request $request, $id) {
            $data['tab'] = 'product-detail';
            $data['product'] = Product::where('id', $id)->first();
            $data['subProducts'] = $data['product']->subProducts;
            $memory = array();
            $color = array();
            foreach ($data['subProducts'] as $subProduct) {
                $memory[] = $subProduct->memory;
                $color[] = $subProduct->color;
            }
            $data['memories'] = array_unique($memory);
            $data['colors'] = array_unique($color);

            if ($request->session()->has('user')) {
                $data['user'] = $request->session()->get('user');
            }

            $view = View::make('store/index', $data);
            return $view;
        }
    }
?>
<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use App\Models\Banner;
    use App\Models\Photo;
    use App\Models\Spec;

    use View;

    class TestController extends Controller {
        public function index(Request $request) {
            $specs = Spec::all();

            foreach ($specs as $spec) {
                $product = $spec->product;
                $product->status = 1;
                $product->display = $spec->display;
                $product->os = $spec->os;
                $product->fcam = $spec->fcam;
                $product->bcam = $spec->bcam;
                $product->cpu = $spec->cpu;
                $product->gpu = $spec->gpu;
                $product->ram = $spec->ram;
                $product->memory = $spec->memory;
                $product->sd = $spec->sd;
                $product->sim = $spec->sim;
                $product->battery = $spec->battery;
                $product->connect = $spec->connect;
                $product->material = $spec->material;
                $product->weight = $spec->weight;

                $product->save();
            }
            

            $view = View::make('common/test', ['product' => $product]);
            return $view;
        }
    }
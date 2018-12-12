<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Banner;
    use App\Models\Photo;
    use View;

    class BannerController extends Controller {
        public function showBanners(Request $request) {
            $data['tab'] = 'banners-list';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $banners = Banner::all();

            $bannersPerPage = 10;
            $data['maxPage'] = count($banners)/$bannersPerPage + 1;

            $data['banners'] = array();
            for ($i = ($page-1)*$bannersPerPage; $i < $page*$bannersPerPage; $i++) {
                if (empty($banners[$i])) {
                    break;
                }
                $data['banners'][] = $banners[$i];
            }
            $data['page'] = $page;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function addBanner(Request $request) {
            $tab = 'add-banner';
            if ($request->isMethod('post')) {
                $url = $request->url;
                $status = $request->status;
                $imgIds = $request->imgIds;
                
                $banner = new Banner();
                $valid = True;
                if (!empty($url)) {
                    $banner->url = $url;
                }
                else {
                    $valid = False;
                    $urlError = "url is empty";
                }

                if (!empty($imgIds)) {  
                    $photo = Photo::where('id', $imgIds[0])->first(); 
                }
                else {
                    $valid = False;
                    $photoError = "photo is empty";
                }
                
                
                if ($valid) {
                    $banner->url = $url;
                    $banner->status = $status;
                    $banner->photo_id = $imgIds[0];                    

                    $banner->save();
                    
                }
            }

            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;

        }

        public function editBanner(Request $request) {
            $tab = 'add-banner';
            $id = $request->id;
            $banner = Banner::where('id', $id)->first();
            if (!empty($banner)) {
                $url = $banner->url;
                $status = $banner->status;
                $photo = $banner->photo;
                
            }
            else {
                return "Banner is not exist";
            }
            
            if ($request->isMethod('post')) {
                $url = $request->url;
                $status = $request->status;
                $imgIds = $request->imgIds;
                
                $valid = True;
                if (!empty($url)) {
                    $banner->url = $url;
                }
                else {
                    $valid = False;
                    $urlError = "url is empty";
                }

                if (!empty($imgIds)) {  
                    $photo = Photo::where('id', $imgIds[0])->first(); 
                }
                else {
                    $valid = False;
                    $photoError = "photo is empty";
                }
                
                
                if ($valid) {
                    $banner->url = $url;
                    $banner->status = $status;
                    $banner->photo_id = $imgIds[0];                    

                    $banner->save();
                    
                }
            }

            $data = get_defined_vars();

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deleteBanners(Request $request) {
            $ids = $request->ids;

            Banner::destroy($ids);
        }
    }
?>
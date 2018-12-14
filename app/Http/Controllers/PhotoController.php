<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Photo;

    use View;

    class PhotoController extends Controller {
        public function showPhotos(Request $request) {
            $data['tab'] = 'photo-manage';
            $page = 1;
            if (isset($request->page)) {
                $page = $request->page;
            }
            $photos = Photo::all();

            $photosPerPage = 20;
            $data['maxPage'] = count($photos)/$photosPerPage;

            $data['photos'] = array();
            for ($i = ($page-1)*$photosPerPage; $i < $page*$photosPerPage; $i++) {
                $data['photos'][] = $photos[$i];
            }
            $data['page'] = $page;

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function showPhotosToChoose(Request $request) {
            $data['photos'] = Photo::all();

            $view = View::make('admin/photo-choose', $data);
            return $view;
        }

        public function addPhoto(Request $request) {
            $data['tab'] = 'add-photo';
            if ($request->isMethod('post')) {

                $files = $request->file('img');
                if (!empty($files)) {              
                    foreach ($files as $file) {
                        $valid = True;
                        $date = date('Y/m/d');
                        $year = substr($date, 0, 4);
                        $month = substr($date, 5, 2);
                        $day = substr($date, 8, 2);
                        $name = $file->getClientOriginalName();
                        $tmp = $file->getRealPath();
                        $size = $file->getsize();
                        
                        $url = 'img/upload/'.$year.'/'.$month.'/'.$day;
                        $type = $file->getClientOriginalExtension();
                        if (!file_exists($tmp) || !getimagesize($tmp)) {
                            $valid = False;
                            $imgError = $imgErr.$name.', ';
                        }
                        if ($valid) {
                            $file->move($url, $name);
                            
                            $photo = new Photo();
                            $photo->url = $url.'/'.$name;
                            $photo->type = $type;
                            $photo->size = $size;
                            $photo->save();

                            $data['successFiles'] = $name.', ';
                        }
                        else {
                            $data['errorFiles'] = $name.', ';
                        }
                    }
                }
                else {
                    $valid = False;
			        $data['errorFiles'] = "No file selected";
                }

            }

            $view = View::make('admin/index', $data);
            return $view;
        }

        public function deletePhotos(Request $request) {
            $ids = $request->ids;

            Photo::destroy($ids);
        }
    }
?>